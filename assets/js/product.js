const showcaseMainImg = document.querySelector('.showcase-main-img')
const showcaseSubImgs = document.querySelectorAll('.showcase-sub-img')

showcaseSubImgs.forEach(el => {
    el.addEventListener('mouseenter', () =>{
        const imgSrc = el.getAttribute('src')
        showcaseMainImg.setAttribute('src', imgSrc)
    })
})