/**
 *  Pour les ressources Departments
 */
 app.factory('Departments', function($resource){
  return $resource(__ENV.apiUrl + "/departments/:id", {}, {
       'update': { method:'PUT' }
   });
 });
