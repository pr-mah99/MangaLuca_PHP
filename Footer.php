
<style>

body {
  margin: 0;
  padding: 0;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.content {
  flex: 1;
  /* تحديد ارتفاع المحتوى ليملأ المساحة الباقية في الصفحة */
}
    footer {
  background-color: #f0f0f0;
  padding: 20px;
  text-align: center;
  position: sticky;
  bottom: 0;
  /* يثبت الفوتر في الأسفل */
}

     body,html {
  scroll-behavior: smooth;
}
    #back-to-top {
        display: none;
        position: fixed;
        bottom: 20px;
        left: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: rgb(209, 45, 86);
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
        opacity: 0.5;
        transition: 0.6s;
    }

    #back-to-top:hover {
        opacity: 0.7;       
        font-weight:300;
        background-color: blueviolet;
        border-radius: 33px;
    }

    #back-to-top:active {
        background-color: yellow;
        color: black;
        border-radius: 8px;
    }

    @media screen and (max-width: 900px) {
        #back-to-top {        
            display: inline-flex;    
            position: fixed;
  /* right: 2rem; */
  bottom: 2rem;
    }
    }
</style>

<!-- Start Footer -->

<footer>
<span class="copyright">&copy; 2023</span>
            <span class="design float-left">Copyright</span>
            <span class="design float-right">MangaLuca Team</span>
   
</footer>

<!-- End Footer -->

<!-- Scroll Down Code -->


<button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>

<script>
    //Get the button
    var mybutton = document.getElementById("back-to-top");


    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";           
        } else {
            mybutton.style.display = "none";    
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>


<!-- End Scroll Down Code -->
   



