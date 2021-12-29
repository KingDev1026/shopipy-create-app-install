var Puffer_Email = '';

function insertScript(url, type) {
    var script = document.createElement(type);
    script.type = 'text/javascript';
    script.src = url;

    document.head.appendChild(script);
}

insertScript('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', 'script')
insertScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', 'script')
insertScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', 'css')

function validateEmail(email) {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}


var modal = `<div id="myModal" style="position:absolute; left: 0; right: 0; width: 100%; height: 100%; z-index: 9999999; background:#c7c7cb; display: block; background-image: url('https://besthqwallpapers.com/Uploads/1-9-2021/177288/thumb2-black-friday-4k-red-silk-bow-sale-background-red-silk-ribbon.jpg'); bacground-repeat: no-repeat; background-size: contain;">
       <div style="position: absolute; top: 40%; width: 100%; justify-content: center; alingn-items: center; text-align: center;">

        <div class="footer-block__newsletter" id="puffer_form" method="post" action="http://localhost:8080/api/insert" method="_self>
            <h1 class="footer-block__heading" style="color:white; font-size: 35px;">You can discount service via this email.</h1>
            <h1 class="footer-block__heading" style="color:white;">You can purchors computers discount 5%.</h1>
            <div class="center">
                <a class="button button--primary" role="link" aria-disabled="false" onclick="javascript: inputData()">
                    Please click this button to get service of disscount.
                </a>
            </div> 
        </div>  

       </div>
     </div>`


function inputData() {
    let email = window.prompt("Please ener your email.", "")
    if (!validateEmail(email)) {
        alert("Please check your email.")
        inputData()
        return;
    }
    $.post("http://localhost:8080/api/insert",
        {
            email: email
        },
        function (data, status) {
            if (data.status === 'success') {
                var img = `<div onclick="javascript:window.location.reload();" style="cusor:pointer; background: #12c06a; width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center;"><img src="http://localhost/check.gif"  /> <h1 style="color: white; font-weight: bold; font-size: 70px;">${data.code}</h1> </div>`
                document.body.innerHTML = img;
                setTimeout(function(){
                    window.location.reload()
                }, 10000)
            }else{
                inputData()
            }
        });
}

function checkShowModal() {
    $.post("http://localhost:8080/api/",
        {},
        function (data, status) {
            if (data === 'show') {
                document.body.innerHTML = document.body.innerHTML + modal;

                var div = document.createElement('div');
                div.innerHTML = modal;
                document.body.prepend(div);
            }
        });
}

setTimeout(function () {
    checkShowModal();
}, 2000)




{/* <form class="footer-block__newsletter" id="puffer_form" method="post" action="http://localhost:8080/api/insert" method="_self>
    <h2 class="footer-block__heading">Please insert your emails. You can discount service via this email.</h2>
    <h2 class="footer-block__heading">You can purchors computers discount 5%.</h2>
    <div class="footer__newsletter newsletter-form">
        <div class="newsletter-form__field-wrapper">
            <div class="field">
                <input type="email" class="field__input"  aria-required="true" autocorrect="off" autocapitalize="off" autocomplete="email" placeholder="Email" required="" id="puffer_email" value="hello" />
                <label class="field__label" for="NewsletterForm--footer">
                    Email
                </label>
                <button type="button" class="newsletter-form__button field__button" name="commit" id="puffer_post" aria-label="Subscribe" onclick="javascript: postData();">
                    <svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor"></path></svg>
                </button>
            </div>
        </div>
    </div>
</form>  */}

{/* <div class="center">
            <a class="button button--primary" role="link" aria-disabled="false">
                Button label
            </a>
        </div>  */}