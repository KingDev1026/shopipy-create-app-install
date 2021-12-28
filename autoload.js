function addHeadTag(tag, options) {
    let item = document.createElement(tag);
    Object.assign(item, options, { async: false });
    document.querySelector("head").appendChild(item)
}

function validate(str){
    var flag = false;
    for(var i = 1; i < str.length; i ++)
        if(str[i] == '@'){
            flag = true;
            break;
        }
    return flag;
}
function subscribe () {
    var a = window.prompt("title", "");
    if(!validate(a)){
        alert("reinsert gmail.");
        return;
    }
    $.post("https://localhost/myshopifyfirstapp/save.php?gmail=" + a, { }, function(data){
        alert(data);
        if(data == "repeat")
            alert("registered!");
        else if(data == "faild")
            alert("Faild Database.")
        else
            alert(data);
    });
}


$(document).ready(function() {
    
    var modal = makeModal();
    document.body.insertAdjacentHTML('beforeend', modal);
    $(modal).modal('show');
    // setListener(modal);

    addHeadTag('link', {
        rel: 'stylesheet',
        href: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
    });

    function makeModal() {
        return `<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h2>service discount</h2>
              <button type="button" id="submit" onclick="subscribe()">subscribe</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
      </div>
      `;
    }
    
    setListener(m1);
    
});