
/*--------- testimonial slider -----*/

function testimonialSlider(){
    const carouselOne = document.getElementById('carouselOne');
    if(carouselOne){/* if the element exists */
         carouselOne.addEventListener('slid.bs.carousel', function() {
            const activeItem = this.querySelector(".active");
            document.querySelector(".js-testimonial-img").src =
            activeItem.getAttribute("data-js-testimonial-img");
         })

    }
}
testimonialSlider();

/*--------- style switcher -----*/
function styleSwitcherToggle(){
    const styleSwitcher = document.querySelector(".js-style-switcher"),
    styleSwitcherToggler = document.querySelector(".js-style-switcher-toggler");

    styleSwitcherToggler.addEventListener("click", function(){
       styleSwitcher.classList.toggle("open");
       this.querySelector('i').classList.toggle("fa-times");
       this.querySelector('i').classList.toggle("fa-cog");

    });
}
styleSwitcherToggle();
    

/*--------- theme colors -----*/
function themeColors(){
    const colorStyle = document.querySelector(".js-color-style"),
    themeeColorsContainer =document.querySelector(".js-theme-colors");

    themeeColorsContainer.addEventListener("click", ({target})=> {
        if(target.classList.contains("js-theme-color-item")){
            console.log(target.getAttribute("data-js-theme-color"));
            localStorage.setItem("color", target.getAttribute("data-js-theme-color"));
            setColor();
        }

    });

    function setColor(){
        let path = colorStyle.getAttribute("href").split("/");
        path = path.slice(0, path.length-1);
        colorStyle.setAttribute("href", path.join("/") + "/" + localStorage.getItem("color") + ".css");


        if(document.querySelector(".js-theme-color-item.active")){
            document.querySelector(".js-theme-color-item.active").classList.remove("active");
        }
        document.querySelector("[data-js-theme-color=" + localStorage.getItem("color") + "]").classList.add("active");
    }

    if(localStorage.getItem("color") !==null){
        setColor();
    }
    else{
        const defaultColor = colorStyle.getAttribute("href").split("/").pop().split(".").shift();
        document.querySelector("[data-js-theme-color=" + defaultColor + "]").classList.add("active");
        console.log(defaultColor);

    }
}

themeColors();

/*--------- dark and light theme  colors -----*/
function themeLightDark(){
    const darkModeCheckbox = document.querySelector(".js-dark-mode");

    darkModeCheckbox.addEventListener("click", function() {
        if(this.checked){
            localStorage.setItem("theme-dark", "true");

        }
        else{
            localStorage.setItem("theme-dark", "false");
        }
        themeMode();
    

    });

    function themeMode(){
        if(localStorage.getItem("theme-dark") === "false"){
            document.body.classList.remove("t-dark");
        }
        else{
            document.body.classList.add("t-dark");

        }
    }

    if(localStorage.getItem("theme-dark") !== null){
        themeMode();
    }
    if(document.body.classList.contains("t-dark")){
        darkModeCheckbox.checked = true;
    }
}

themeLightDark();

/*--- glass effect  -----*/
function themeGlassEffect(){
    const glassEffectCheckbox = document.querySelector(".js-class-effect"),
    glassStyle = document.querySelector(".js-glass-style");

    glassEffectCheckbox.addEventListener("click", function(){
        if(this.checked){
            localStorage.setItem("glass-effect","true");
        }
        else{
            localStoragge.setitem("glass-effect","false");
        }
        glass();
    });

    function glass(){
        if(localStorage.getItem("glass-effect") === "true"){
            glassStyle.removeAttribute("disabled");
        }
        else{
            glassStyle.disabled = true;
        }


    }
    if(localStorage.getitem("glass-effect") !== null){
        glass();
    }

    if(glassStyle.hasAttribute("disabled")){
        glassEffectCheckbox.checked = true;
    }
}
themeGlassEffect();


