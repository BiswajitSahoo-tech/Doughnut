/*function encode(jsn){
    var flag = 1 ;
let myPromise = new Promise(function(myResolve, myReject) {
  let req = new XMLHttpRequest();
  req.open('POST', "../js/encrypt.php");
  req.onload = function() {
    if (req.status == 200) {
      myResolve(req.responseText);
    } else {
      myReject("File not Found");
    }
  };
  req.send("string="+jsn+"&flag="+flag);
});

myPromise.then(
  function(value) {return value},
  function(error) {alert(error)}
);
}

function decode(base64){
    var flag = 2 ;
let myPromise = new Promise(function(myResolve, myReject) {
  let req = new XMLHttpRequest();
  req.open('POST', "../js/encrypt.php");
  req.onload = function() {
    if (req.status == 200) {
      myResolve(req.responseText);
    } else {
      myReject("File not Found");
    }
  };
  req.send("string="+base64+"&flag="+flag);
});

myPromise.then(
  function(value) {return value},
  function(error) {alert(error)}
);
}
*/




async function decode(base64){
  var flag = 2 ;
  let myPromise = new Promise(function(myResolve, myReject) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        alert(this.responseText);
        myResolve(this.responseText);
        
    };
    xmlhttp.open("POST","../js/encrypt.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("string="+base64+"&flag="+flag);
  });
  return JSON.parse(await myPromise);
  //return x.value ;
}










/*async function encode(jsn){
  var flag = 1 ;
  let myPromise = new Promise(function(myResolve, myReject) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        alert(this.responseText);
        myResolve(this.responseText);
        
    };
    xmlhttp.open("POST","../js/encrypt.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("string="+jsn+"&flag="+flag);
  });
  var x = await myPromise;
  return x ;
}
async function decode(base64){
  var flag = 2 ;
  let myPromise = new Promise(function(myResolve, myReject) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        alert(this.responseText);
        myResolve(this.responseText);
        
    };
    xmlhttp.open("POST","../js/encrypt.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("string="+base64+"&flag="+flag);
  });
  var x = await myPromise;
  return x ;
}
/*function encode(jsn){
     return request(jsn,1);
}
function decode(base64){
    //alert(request(base64,2))
    var x = request(base64,2);
    alert("Re");
    return x ;
    
}
function request(str,flag){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        alert(this.responseText);
        return this.responseText ;
        
    };
    xmlhttp.open("POST","../js/encrypt.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("string="+str+"&flag="+flag);
}*/