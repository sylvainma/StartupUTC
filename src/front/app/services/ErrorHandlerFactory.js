/**
 *  Factory pour gérer les erreurs
 */
app.factory('ErrorHandler', function(Alert){
  return {

    alert: function(error) {
      return Alert.open("Erreur", this.parse(error).message);
    },

    parse: function(error) {
      console.log(error);
      var e = {
        status : error.status
      };
      switch (error.status) {
        case 409:
          e.message = "Vous tentez de créer une ressource qui existe déjà. Veuillez modifier vos informations.";
          break;
        case 422:
          e.message = this.inputErrors(error);
          break;
        default:
          e.message = "Une erreur interne est survenue. Veuillez contacter un administrateur";
          break;
      }
      return e;
    },

    inputErrors : function(error) {
      var m = "";
      for(e in error.data.data) {
        m += error.data.data[e][0] + " ";
      };
      return m;
    }

  }
});
