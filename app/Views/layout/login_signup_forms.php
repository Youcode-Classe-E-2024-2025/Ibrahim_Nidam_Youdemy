<style>
label {
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.2s ease;
    pointer-events: none;
    transform: translateY(0);
    font-size: 1rem;
    color: white;
}

input:focus ~ label,
input.filled ~ label,
label.filled {
    transform: translateY(-1rem) scale(0.6);
    color: white;
}
</style>


<div class="flex gap-2 items-center">
    <button onclick="openForm('signin')" class="text-white tracking-wider px-3 py-2 rounded bg-rose-600 hover:bg-rose-700 transform transition-all shadow-md">
        Sign In
    </button>
    <button onclick="openForm('learn')" class="text-white tracking-wider px-3 py-2 rounded bg-rose-600 hover:bg-rose-700 transform transition-all shadow-md">
        Learn
    </button>
    <button onclick="openForm('teach')" class="text-white tracking-wider px-3 py-2 rounded bg-rose-600 hover:bg-rose-700 transform transition-all shadow-md">
        Teach
    </button>
</div>

<!-- Sign In Modal -->
<div id="signinModal" class="fixed top-0 left-0 w-screen h-screen overflow-hidden bg-gradient-to-tl from-rose-800 via-rose-400 to-white hidden items-center justify-center z-50">
    <div class="relative w-full max-w-md">
        <button onclick="closeForm()" class="absolute top-5 right-5 text-white cursor-pointer">✕</button>
        <h2 class="text-3xl font-bold text-white mb-4">Sign In</h2>
        <form id="signinForm" action="login" method="post" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <div class="relative">
                <input type="email" id="email" name="email" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="email" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Username</label>
            </div>
            <div class="relative">
                <input type="password" id="password" name="password" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="password" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Password</label>
            </div>
            <button type="submit" class="w-full bg-white text-rose-600 border-2 border-white rounded-lg py-2 px-4 hover:bg-transparent hover:text-white transition-colors">Sign In</button>
        </form>
    </div>
</div>

<!-- Learn Modal -->
<div id="learnModal" class="fixed top-0 left-0 w-screen h-screen overflow-hidden bg-gradient-to-tl from-rose-800 via-rose-400 to-white hidden items-center justify-center z-50">
    <div class="relative w-full max-w-md">
        <button onclick="closeForm()" class="absolute top-5 right-5 text-white cursor-pointer">✕</button>
        <h2 class="text-3xl font-bold text-white mb-4">Sign Up to Learn</h2>
        <form id="learnForm" action="register-student" method="post" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <div class="relative">
                <input type="text" id="learn-username" name="learn-username" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="learn-username" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Username</label>
            </div>
            <div class="relative">
                <input type="email" id="learn-email" name="learn-email" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="learn-email" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Email</label>
            </div>
            <div class="relative">
                <input type="password" id="learn-password" name="learn-password" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="learn-password" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Password</label>
            </div>
            <div class="relative">
                <input type="password" id="learn-password-confirmed" required name="learn-password-confirmed" onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="learn-password-confirmed" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Confirm Password</label>
            </div>
            <button type="submit" class="w-full bg-white text-rose-600 border-2 border-white rounded-lg py-2 px-4 hover:bg-transparent hover:text-white transition-colors">Register as Student</button>
        </form>
    </div>
</div>

<!-- Teach Modal -->
<div id="teachModal" class="fixed top-0 left-0 w-screen h-screen overflow-hidden bg-gradient-to-tl from-rose-800 via-rose-400 to-white hidden items-center justify-center z-50">
    <div class="relative w-full max-w-md">
        <button onclick="closeForm()" class="absolute top-5 right-5 text-white cursor-pointer">✕</button>
        <h2 class="text-3xl font-bold text-white mb-4">Sign Up to Teach</h2>
        <form id="teachForm" action="register-teacher" method="post" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <div class="relative">
                <input type="text" id="teach-username" name="teach-username" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="teach-username" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Username</label>
            </div>
            <div class="relative">
                <input type="email" id="teach-email" name="teach-email" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="teach-email" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Email</label>
            </div>
            <div class="relative">
                <input type="password" id="teach-password" name="teach-password" required onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="teach-password" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Password</label>
            </div>
            <div class="relative">
                <input type="password" id="teach-password-confirmed" required name="teach-password-confirmed" onblur="checkInput(this)" class="w-full bg-transparent border-b-2 border-white px-0 py-1 text-white focus:outline-none focus:border-white focus:shadow-sm peer mb-2" />
                <label for="teach-password-confirmed" class="absolute left-0 text-white transition-all peer-focus:-translate-y-5 peer-focus:text-sm peer-active:-translate-y-5 peer-active:text-sm">Confirm Password</label>
            </div>
            <button type="submit" class="w-full bg-white text-rose-600 border-2 border-white rounded-lg py-2 px-4 hover:bg-transparent hover:text-white transition-colors">Register as Teacher</button>
        </form>
    </div>
</div>

<script defer>
function openForm(type) {
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    const modal = document.getElementById(type + 'Modal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

function closeForm() {
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });
}

function checkInput(input) {
    const label = document.querySelector(`label[for="${input.id}"]`);
    if (input.value.trim() !== '') {
        label.classList.add('filled');
    } else {
        label.classList.remove('filled');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        checkInput(input);
        input.addEventListener('input', () => checkInput(input));
        input.addEventListener('focus', () => {
            const label = document.querySelector(`label[for="${input.id}"]`);
            label.classList.add('filled');
        });
        input.addEventListener('blur', () => {
            const label = document.querySelector(`label[for="${input.id}"]`);
            if (input.value.trim() === '') {
                label.classList.remove('filled');
            }
        });
    });
});

document.addEventListener("keyup", function (e) {
    if (e.key === "Escape" || e.key === "Enter") {
        closeForm();
    }
});

const VALIDATION_RULES = {
    email: {
        pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        message: 'Please enter a valid email address'
    },
    password: {
        pattern: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
        message: 'Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character'
    },
    username: {
        pattern: /^[a-zA-Z0-9_]{3,20}$/,
        message: 'Username must be 3-20 characters and can only contain letters, numbers, and underscores'
    }
};

function createErrorMessage(input, message) {
    const existingError = input.parentElement.querySelector('.error-message');
    if (existingError) {
        existingError.textContent = message;
        return;
    }
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message text-red-200 text-sm mt-1';
    errorDiv.textContent = message;
    input.parentElement.appendChild(errorDiv);
}

function removeErrorMessage(input) {
    const errorDiv = input.parentElement.querySelector('.error-message');
    if (errorDiv) {
        errorDiv.remove();
    }
}

function validateInput(input) {
    if (input.closest('#signinForm')) {
        return true;
    }

    const value = input.value.trim();
    const inputType = input.type;
    const inputId = input.id;

    if (input.hasAttribute('required') && !value) {
        createErrorMessage(input, 'This field is required');
        return false;
    }

    if (inputType === 'email' && value) {
        if (!VALIDATION_RULES.email.pattern.test(value)) {
            createErrorMessage(input, VALIDATION_RULES.email.message);
            return false;
        }
    }

    if (inputType === 'password' && value) {
        if (!VALIDATION_RULES.password.pattern.test(value)) {
            createErrorMessage(input, VALIDATION_RULES.password.message);
            return false;
        }

        if (inputId.includes('-password-confirmed')) {
            const passwordInput = document.getElementById(inputId.replace('-confirmed', ''));
            if (passwordInput && value !== passwordInput.value) {
                createErrorMessage(input, 'Passwords do not match');
                return false;
            }
        }
    }

    if (inputId.includes('username') && value) {
        if (!VALIDATION_RULES.username.pattern.test(value)) {
            createErrorMessage(input, VALIDATION_RULES.username.message);
            return false;
        }
    }

    removeErrorMessage(input);
    return true;
}

function handleFormSubmit(event) {
    const form = event.target;
    
    if (form.id === 'signinForm') {
        return true;
    }

    const inputs = form.querySelectorAll('input:not([type="hidden"])');
    let isValid = true;

    inputs.forEach(input => {
        if (!validateInput(input)) {
            isValid = false;
        }
    });

    if (!isValid) {
        event.preventDefault();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const originalCheckInput = window.checkInput;
    window.checkInput = function(input) {
        originalCheckInput(input);
        if (!input.closest('#signinForm')) {
            validateInput(input);
        }
    };

    const forms = ['learnForm', 'teachForm']; 
    forms.forEach(formId => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', handleFormSubmit);
        }
    });

    document.querySelectorAll('#learnForm input:not([type="hidden"]), #teachForm input:not([type="hidden"])').forEach(input => {
        input.addEventListener('input', () => validateInput(input));
    });
});
</script>