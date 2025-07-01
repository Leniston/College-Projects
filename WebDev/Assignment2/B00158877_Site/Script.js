document.addEventListener('DOMContentLoaded', () => {
    // Dropdown hover functionality
    const dropdown = document.querySelector('.nav-item.dropdown');
    if (dropdown) {
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        dropdown.addEventListener('mouseenter', () => {
            dropdownMenu.classList.add('show');
        });

        dropdown.addEventListener('mouseleave', () => {
            dropdownMenu.classList.remove('show');
        });
    }

    // Form handling for both contact and booking forms
    const contactForm = document.getElementById('contactForm');
    const contactSuccessMessage = document.getElementById('successMessage');
    const bookingForm = document.getElementById('bookingForm');
    const bookingSuccessMessage = document.getElementById('bookingSuccessMessage');

    // Contact form handling
    if (contactForm) {
        contactForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const inputs = contactForm.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.classList.remove('invalid');
            });

            let isValid = true;
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.classList.add('invalid');
                    isValid = false;
                }
            });

            if (isValid) {
                contactForm.classList.add('d-none');
                contactSuccessMessage.classList.remove('d-none');
            } else {
                contactForm.classList.add('was-validated');
            }
        });
    }

    // Booking form handling
    if (bookingForm) {
        bookingForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const inputs = bookingForm.querySelectorAll('.form-control, input[type="radio"]');
            inputs.forEach(input => {
                input.classList.remove('invalid');
            });

            let isValid = true;
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.classList.add('invalid');
                    isValid = false;
                }
            });

            // Additional validation for radio buttons
            const petTypeSelected = bookingForm.querySelector('input[name="petType"]:checked');
            if (!petTypeSelected) {
                isValid = false;
                document.querySelectorAll('input[name="petType"]').forEach(radio => {
                    radio.classList.add('invalid');
                });
            }

            if (isValid) {
                bookingForm.classList.add('d-none');
                bookingSuccessMessage.classList.remove('d-none');
            } else {
                bookingForm.classList.add('was-validated');
            }
        });
    }

    // Booking form date handling
    const yearSelect = document.getElementById('year');
    const monthSelect = document.getElementById('month');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');

    // Set minimum date to today
    if (startDateInput) {
        const today = new Date().toISOString().split('T')[0];
        startDateInput.min = today;
        
        startDateInput.addEventListener('change', () => {
            endDateInput.min = startDateInput.value;
            if (endDateInput.value && endDateInput.value < startDateInput.value) {
                endDateInput.value = startDateInput.value;
            }
        });
    }

    // Function to populate months
    function populateMonths() {
        monthSelect.disabled = false;
        monthSelect.innerHTML = '<option value="">Select a month</option>';

        const selectedYear = yearSelect.value;
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        const months = [
            'January', 'February', 'March', 'April', 
            'May', 'June', 'July', 'August', 
            'September', 'October', 'November', 'December'
        ];

        months.forEach((month, index) => {
            if (selectedYear > currentYear || (selectedYear == currentYear && index >= currentMonth)) {
                const option = document.createElement('option');
                option.value = index + 1;
                option.text = month;
                monthSelect.add(option);
            }
        });
    }

    // Function to populate dates
    function populateDates() {
        startDateInput.disabled = false;
        endDateInput.disabled = false;

        const selectedYear = parseInt(yearSelect.value);
        const selectedMonth = parseInt(monthSelect.value);

        if (selectedYear && selectedMonth) {
            const firstDay = new Date(selectedYear, selectedMonth - 1, 1);
            const lastDay = new Date(selectedYear, selectedMonth, 0);

            startDateInput.min = firstDay.toISOString().split('T')[0];
            startDateInput.max = lastDay.toISOString().split('T')[0];
            endDateInput.min = firstDay.toISOString().split('T')[0];
            endDateInput.max = lastDay.toISOString().split('T')[0];

            startDateInput.value = '';
            endDateInput.value = '';
        }
    }

    // Add event listeners for the select elements
    if (yearSelect) {
        yearSelect.addEventListener('change', populateMonths);
    }
    if (monthSelect) {
        monthSelect.addEventListener('change', populateDates);
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    document.querySelectorAll('.gallery-item').forEach(item => {
        observer.observe(item);
    });

    // Back to top button functionality
    let mybutton = document.getElementById("btn-back-to-top");

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
            setTimeout(() => {
                mybutton.style.opacity = "1";
            }, 10);
        } else {
            mybutton.style.opacity = "0";
            setTimeout(() => {
                mybutton.style.display = "none";
            }, 300);
        }
    }

    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    // Special requirements checkbox handling
    const specialRequirementsCheckbox = document.getElementById('specialRequirements');
    const specialRequirementsSection = document.getElementById('specialRequirementsSection');

    if (specialRequirementsCheckbox) {
        specialRequirementsCheckbox.addEventListener('change', function() {
            specialRequirementsSection.style.display = this.checked ? 'block' : 'none';
            
            if (!this.checked) {
                document.getElementById('requirementsDetails').value = '';
            }
        });
    }
});