//Title constructor function that creates a Title object



// for changing ROW Color

function changeColor()
{
    //for row 1
    
    if(document.frm.chk1.checked)
    {
        document.getElementById("tr1").style.backgroundColor="#cccc00  "
        document.getElementById("button").style.backgroundColor="#A9A9A9  "
    }
    else
    {
        document.getElementById("tr1").style.backgroundColor="white"
        document.getElementById("button").style.backgroundColor="orange"
    }
    
    
    // for row 2
    
    if(document.frm.chk2.checked)
    {
        document.getElementById("tr2").style.backgroundColor="#cccc00  "
        document.getElementById("button").style.backgroundColor="#A9A9A9  "

   }
    else
    {
        document.getElementById("tr2").style.backgroundColor="white"
        
    }
    
    
    //for row 3
    
    if(document.frm.chk3.checked)
    {
        document.getElementById("tr3").style.backgroundColor="#cccc00  "
        document.getElementById("button").style.backgroundColor="#A9A9A9  "
    }
    else
    {
        document.getElementById("tr3").style.backgroundColor="white"
    }
    
}
function dropFunction(y) {
        var x = document.getElementById(y);
        if (x.style.display === 'none') {
            x.style.display = '';
        } else {
            x.style.display = 'none';
        }
    }
    function hideAll() {
    hideRow('drop1');
  
  }