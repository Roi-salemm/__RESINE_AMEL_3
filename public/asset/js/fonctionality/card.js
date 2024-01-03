const card = document.querySelectorAll(".card2");

card.forEach( el => {

    el.addEventListener("mousemove", e => {
        
        let elRect = el.getBoundingClientRect();
        let x = e.clientX - elRect.x;
        let y = e.clientY - elRect.y;

        let midCardWidth = elRect.width / 2;
        let midCardHeight = elRect.height / 2;

        let angleY = -(x - midCardWidth) / 8;
        let angleX = (y - midCardHeight) / 8;


        // let rotate = `rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.1);`;

        let rotate = `
        transform: rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.1);
        transition: all 0.15s ease-out;
        `;
        
        // pour l'image 

        // console.log(rotate);
        // console.log(el.children[0]);
        // console.log(el);
        // console.log(el.firstChild);
        // console.log(el.firstElementChild);

        let testel = el.children[0];
        console.log(testel);


        el.children[0].style = rotate;
        // el.children[0].style.transform = rotate;


        // el.firstElementChild.style.transform = rotate;


        // el.firstChild.style("transform", rotate);

        
        // el.firstChild.style["transform"]=rotate;


        


        // pour l'effet le lumiére
        // el.children[1].style.transform = `retateX(${angleX}deg) rotateY(${angleY}deg) scale(1.1)`;
        
        // let glowX = x / elRect.width * 100;
        // let glowY = y /elRect.height * 100;

        // el.children[1].style.background = `radial-gradient(circle at ${glowX}% ${glowY}%, rgb(234, 203, 235), transparent)`;
        
        

        console.log(el.children[0].style);
    });

    // el.addEventListener("mouseleave", () => {
    //     el.children[0].style.transform = "rotateX(0) retateY(0)";
    //     // el.children[1].style.transform = "rotateX(0) retateY(0)";

       
    // });

});


