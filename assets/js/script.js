let openMenuIcon = document.getElementById('irf-open-menu')
let closeMenuIcon = document.getElementById('irf-close-menu')
let menuElement = document.getElementsByClassName('irf-nav')[0]

openMenuIcon.onclick = () => {
    menuElement.style.transform = 'translate(0%)'
}

closeMenuIcon.onclick = () => {
    menuElement.style.transform = ''
}