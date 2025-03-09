        window.addEventListener('scroll', function () {
            const sectionOne = document.querySelector('.section-one');
            const parallaxElement = document.querySelector('.parallax-texture');

            // Obtener la posición del scroll y la posición de la sección
            const sectionTop = sectionOne.offsetTop;
            const sectionHeight = sectionOne.offsetHeight;
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;

            const offset = scrollY - (sectionTop - windowHeight);

            // Calcular el efecto de parallax solo si el scroll está dentro de la sección
            if (scrollY >= sectionTop - windowHeight && scrollY < (sectionTop + sectionHeight)) {
                const offset = scrollY - sectionTop;
                const movementFactor = 0.5; // Ajustar para mayor o menor efecto
                parallaxElement.style.transform = `translateY(${offset * movementFactor}px)`;
            }
        });
