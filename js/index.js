const cards = document.querySelectorAll(`.comments__card`)
const leftArrow = document.querySelector(`#left`)
const rightArrow = document.querySelector(`#right`)
const wrapper = document.querySelector(`.comments__wrapper`)

let x = 0
let current = 1

if (window.innerWidth > 1300) {
    setHide = () => {
        if (current <= 0) {
            leftArrow.classList.add('hide')
        } else if (current + 1 === cards.length) {
            rightArrow.classList.add('hide')
        } else {
            leftArrow.classList.remove('hide')
            rightArrow.classList.remove('hide')
        }
    }

    const setScale = () => {
        cards.forEach((item) => {
            item.style.transform = `scale(1)`
        })
        cards[current].style.transform = `scale(1.5)`
    }

    leftArrow.addEventListener('click', () => {
        if (current > 0) {
            current -= 1
            x += 375
            wrapper.style.transform = `translateX(${x}px)`
            setScale()
            setHide()
        }

    })

    rightArrow.addEventListener('click', () => {
        if (current + 1 < cards.length) {
            current += 1
            x -= 375
            wrapper.style.transform = `translateX(${x}px)`
            setScale()
            setHide()
        }

    })
    setScale()
}

if (window.innerWidth < 1300 && window.innerWidth >= 767) {

    const swap = (window.innerWidth * 0.45)

    setHide = () => {
        if (current <= 1) {
            leftArrow.classList.add('hide')
        } else if (current + 1 === cards.length) {
            rightArrow.classList.add('hide')
        } else {
            leftArrow.classList.remove('hide')
            rightArrow.classList.remove('hide')
        }
    }

    leftArrow.addEventListener('click', () => {
        if (current > 1) {
            current -= 1
            x += swap
            console.log(swap)
            wrapper.style.transform = `translateX(${x}px)`
            setHide()
        }

    })

    rightArrow.addEventListener('click', () => {
        if (current + 1 < cards.length) {
            current += 1
            x -= swap
            wrapper.style.transform = `translateX(${x}px)`
            setHide()
        }

    })
    setHide()
}

if (window.innerWidth < 767) {

    const swap = (window.innerWidth * 0.7)

    setHide = () => {
        if (current <= 1) {
            leftArrow.classList.add('hide')
        } else if (current + 1 === cards.length) {
            rightArrow.classList.add('hide')
        } else {
            leftArrow.classList.remove('hide')
            rightArrow.classList.remove('hide')
        }
    }

    leftArrow.addEventListener('click', () => {
        if (current > 1) {
            current -= 1
            x += swap
            wrapper.style.transform = `translateX(${x}px)`
            setHide()
        }

    })

    rightArrow.addEventListener('click', () => {
        if (current + 1 < cards.length) {
            current += 1
            x -= swap
            wrapper.style.transform = `translateX(${x}px)`
            setHide()
        }

    })
    setHide()
}