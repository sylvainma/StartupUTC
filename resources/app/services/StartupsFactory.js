/**
 *  Pour les ressources Startups
 */
 app.factory('Startups', function($resource){
  return $resource(__ENV.apiUrl + "/startups/:id", {}, {
       'update': { method:'PUT' }
   });
 });
