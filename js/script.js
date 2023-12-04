//Go To Header
function goToHeader(){
    // SHOW overlay
    $('#overlay').show();
    // Retrieve data:
    $.ajax({
    url: './header.php?order=' + order,
    context: document.body,
    success: function(s,x){
        $(this).html(s);
		$('#overlay').hide();
    }
});

return false;
}

//Go To Lines
function goToLines(){
    // SHOW overlay
    $('#overlay').show();
    // Retrieve data:
    $.ajax({
    url: './lines.php?order=' + order,
    context: document.body,
    success: function(s,x){
        $(this).html(s);
		$('#overlay').hide();
    }
});

return false;
}

//Go To Line
function goToLine(){
    // SHOW overlay
    $('#overlay').show();
    // Retrieve data:
    $.ajax({
    url: './line.php?order=' + order + '&line=' + line,
    context: document.body,
    success: function(s,x){
        $(this).html(s);
		$('#overlay').hide();
    }
});

return false;
}

//Create overlay and append to body:
$(document).ready(function(){
    $('<div id="overlay"/>').css({
        position: 'absolute',
        top: 0,
        left: 0,
        width: '100%',
        height: $(window).height() + 'px',
        opacity:0.4, 
        background: 'lightgray url(./images/loading.gif) no-repeat center'
    }).hide().appendTo('body');
});

//Resize Textbox
function do_resize(textbox) {

 var maxrows=999; 
  var txt=textbox.value;
  var cols=textbox.cols;
var linesUsed = $('#linesUsed');

 var arraytxt=txt.split('\n');
  var rows=arraytxt.length; 
  
 for (i=0;i<arraytxt.length;i++) 
  rows+=parseInt(arraytxt[i].length/cols);
  linesUsed.text(rows);

 if (rows>maxrows) textbox.rows=maxrows;
  else textbox.rows=rows;
 }
 
//Print Textbox
function updateDiv() {

  var printArea = document.getElementById("printableArea").innerHTML;
 
 return printArea;

}

function printDiv() {

  var printContents = updateDiv();
  
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();

}


//Back Clicked
function backClicked()   
{
    window.location = './access.php'
	return false;
}
