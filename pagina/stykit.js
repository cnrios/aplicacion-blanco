const link = document.createElement('link')
link.type = 'text/css'
link.rel = 'stylesheet'
link.media = 'screen,print'
link.href = './stykit.css'
document.getElementsByTagName('head')[0].appendChild(link)

const randomIntFromInterval = (min, max) => Math.floor(Math.random() * (max - min + 1) + min)

let effectMovingParallax = []

window.addEventListener('mousemove', event => {
	effectMovingParallax.forEach(element => {
		const x = (event.clientX * element.effectMovingParallaxValue) / 250
		const y = (event.clientY * element.effectMovingParallaxValue) / 250
		element.style.translate = `${x}px ${y}px`
    })
})

document.querySelectorAll('[class]').forEach(element => {
    [...element.classList].forEach(className => {

        if(className.startsWith('neon-') && !className.startsWith('neon-text')) {
            const color = className.split('-')[1]
            const blur = className.split('-')[2] || 100
            const range = className.split('-')[3] || 25
            element.style.boxShadow = `0px 0px ${blur}px ${range}px ${color}`
        }

        if(className.startsWith('neon-text')) {
            const color = className.split('-')[2]
            element.style.color = '#fff'
            element.style.textShadow = `
                0 0 7px #fff,
                0 0 10px #fff,
                0 0 21px #fff,
                0 0 42px ${color},
                0 0 82px ${color},
                0 0 92px ${color},
                0 0 102px ${color},
                0 0 151px ${color}`
        }

        if(className.startsWith('glass-')) {
            const blur = className.split('-')[1] || 100
            const transparency = className.split('-')[2] ||0.25
            element.style.backgroundColor = `rgba(255, 255, 255, ${transparency})`
            element.style.boxShadow += '0 4px 30px rgba(0, 0, 0, 0.25)'
            element.style.backdropFilter = `blur(${blur})`
            element.style.border = 'border: 1px solid rgba(255, 255, 255, 0.25)'
            element.style.borderRadius = '10px'
        }

        if(className === 'back-top') window.scrollTo({top: 0, behavior: 'smooth'})

        if(className.startsWith('bg-random-color')) {
            const min = parseInt(className.split('-')[3]) || 0
            const max = parseInt(className.split('-')[4]) || 255
            const transparency = className.split('-')[5] || 1
            element.style.backgroundColor = `rgba(${randomIntFromInterval(min, max)}, ${randomIntFromInterval(min, max)}, ${randomIntFromInterval(min, max)}, ${transparency})`
        }

        if(className.startsWith('text-random-color')) {
            const min = parseInt(className.split('-')[3]) || 0
            const max = parseInt(className.split('-')[4]) || 255
            const transparency = className.split('-')[5] || 1
            console.log(transparency);
            element.style.color = `rgba(${randomIntFromInterval(min, max)}, ${randomIntFromInterval(min, max)}, ${randomIntFromInterval(min, max)}, ${transparency})`
        }

        if(className.startsWith('scroll-')) {
            const target = className.split('-')[1]
            element.addEventListener('click', e => {
                document.querySelector(target).scrollIntoView({
                    behavior: 'auto',
                    block: 'center',
                    inline: 'center'
                })
            })
        }

        if(className.startsWith('mouse-parallax-')) {
            const moving = parseInt(className.split('-')[2])
            element.effectMovingParallaxValue = moving
            effectMovingParallax.push(element)
        }

        if(className.startsWith('hover-display-')) {
            const target = className.split('-')[2]
            const targets = element.parentNode.querySelectorAll(target)
            targets.forEach(targetElement => {
                targetElement.oldDisplay = window.getComputedStyle(targetElement).display
                targetElement.style.display = 'none'
            })
            element.addEventListener('mouseover', event => {
                targets.forEach(targetElement => {
                    targetElement.style.display = targetElement.oldDisplay
                })
            })
            element.addEventListener('mouseleave', event => {
                targets.forEach(targetElement => {
                    targetElement.style.display = 'none'
                })
            })
        }

        if(className.startsWith('click-display-')) {
			console.log('asd')
            const target = className.split('-')[2]
            const targets = document.querySelectorAll(target)
            targets.forEach(targetElement => {
                targetElement.oldDisplay = window.getComputedStyle(targetElement).display
                targetElement.style.display = 'none'
            })
            element.addEventListener('click', event => {
                targets.forEach(targetElement => {
                    window.getComputedStyle(targetElement).display === 'none'
                        ? targetElement.style.display = targetElement.oldDisplay
                        : targetElement.style.display = 'none'
                })
            })
        }

    })
})