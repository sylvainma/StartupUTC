/**
 *  Pour les ressources Fields
 */
 app.factory('Fields', function($resource){
  return $resource(__ENV.apiUrl + "/fields/:id", {}, {
       'update': { method:'PUT' }
   });
 });
