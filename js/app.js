/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function(){
    console.log("Application started");
    
    unlockButton = function(){
        console.log("unlock");
      document.getElementById('send').disabled = false;  
    };
    
    lockButton = function(){
        console.log('lock');
        document.getElementById('send').disabled = true;
    };
};


