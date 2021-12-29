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
    var mail = window.prompt("title", "");
    if(!validate(mail)){
        alert("reinsert gmail.");
        return;
    }
    
    $.ajax({
      url: "https://localhost/myshopifyfirstapp/save.php",
      type: 'POST',
      data: {
        mail: mail
      },
      success: function (data) {
        if(data == "repeat")
            alert("registered!");
        else if(data == "faild")
            alert("Faild Database.")
        else
            alert(data);
      },
      error: function (error) {
          console.log(error)
      }
  });
}
$(document).ready(function() {    
    var modal = makeModal();
    document.body.insertAdjacentHTML('beforeend', modal);
    $(modal).modal('show');
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
});