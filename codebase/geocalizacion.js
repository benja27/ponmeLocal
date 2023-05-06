class Geolocalización{
  constructor(objLat, objLon){
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(this.showPosition.bind(this));
    } else {
      console.log("La geolocalización no es compatible con este navegador.");
    } 
    this.objLat = objLat
    this.objLon = objLon   
  }    
  
  showPosition(position) {
    let userLatitude = position.coords.latitude;
    let userLongitude = position.coords.longitude;
  
    let objLatitude = 19.413293393367937
    let objLongitude = -98.95579742529388  
    
    let near =  this.isNearby(userLatitude, userLongitude, objLatitude, objLongitude)
    if (near) {
      console.log("El objeto está cerca");
    } else {
      console.log("El objeto está lejos");
    }
  }  
  distance(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radio de la Tierra en km
    var dLat = this.deg2rad(lat2 - lat1);
    var dLon = this.deg2rad(lon2 - lon1);
    var a =
      Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(this.deg2rad(lat1)) *
        Math.cos(this.deg2rad(lat2)) *
        Math.sin(dLon / 2) *
        Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;     
    return d;
  }
  
  deg2rad(deg) {
    return deg * (Math.PI / 180);
  }

  isNearby(userLatitude, userLongitude, objectLatitude, objectLongitude) {
    var distanceInKm = this.distance(
      userLatitude,
      userLongitude,
      objectLatitude,
      objectLongitude
    );
    return distanceInKm <= 3; 
  }  
}

let geo = new Geolocalización
