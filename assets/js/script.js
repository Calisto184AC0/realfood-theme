// En JavaScript no hay una operación módulo y se necesita para saber el índice del array
let ModuloJS = (a, n) => {
    return ((a % n ) + n ) % n
}

// #region Menu header

let openMenuIcon = document.getElementById('irf-open-menu')
let closeMenuIcon = document.getElementById('irf-close-menu')
let menuElement = document.getElementsByClassName('irf-nav')[0]

openMenuIcon.onclick = () => { menuElement.style.transform = 'translate(0%)' }
closeMenuIcon.onclick = () => { menuElement.style.transform = '' }

// #endregion Menu header

// #region Carousel

let carouselContainer = document.getElementById('irf_carousel')
let carouselText
let carouselImage
let carouselURL


//let carouselElements = new Array();
//let carouselIndex = 0;

// Prueba
//carouselElements.push(new CarouselElement("../img/castillo.png", "San Antonio de Benagéver", "#"))
//carouselElements.push(new CarouselElement("../img/img1.png", "Una montaña", "#"))
//carouselElements.push(new CarouselElement("../img/img2.png", "Algo", "#"))

// Cuando se pulsa una dirección del botón se cambie de imagen

if ( carouselContainer !== null ) {

    let CarouselChange = (index) => {
        carouselURL.classList.toggle('fade');
        carouselText.innerHTML = carouselElements[index].text
        setTimeout(() => { 
            carouselImage.src = carouselElements[index].src
            carouselURL.classList.toggle('fade')
        }, 300)
        carouselURL.href = carouselElements[index].url
    }

    let leftIcon = document.getElementById('irf_left')
    let rightIcon = document.getElementById('irf_right')

    carouselText = document.getElementById('irf_text')
    carouselImage = document.getElementById('irf_img')
    carouselURL = carouselImage.parentElement

    // Cuando se carga la página
    CarouselChange(0)

    leftIcon.onclick = () => { CarouselChange( carouselIndex = ModuloJS(carouselIndex - 1, carouselElements.length) ) }
    rightIcon.onclick = () => { CarouselChange( carouselIndex = ModuloJS(carouselIndex + 1, carouselElements.length) ) }
}

// #endregion Carousel
