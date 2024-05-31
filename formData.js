function saveFormData() {
    const formData = {
        name: document.getElementById('nombre')?.value,
        lastname: document.getElementById('apellido')?.value,
        phone: document.getElementById('celular')?.value,
        email: document.getElementById('correo').value,
        password: document.getElementById('contrasena').value,
    }
    localStorage.setItem('saveFormData', JSON.stringify(formData))
}

function loadFormDataRegistration() {
    const formData = localStorage.getItem('saveFormData')
    if (formData) {
        const data = JSON.parse(formData)
        document.getElementById('nombre').value = data.name || ''
        document.getElementById('apellido').value = data.lastname || ''
        document.getElementById('celular').value = data.phone || ''
        document.getElementById('correo').value = data.email || ''
        document.getElementById('contrasena').value = data.password || ''
    }
}

function loadFormDataLogin() {
    const formData = localStorage.getItem('saveFormData')
    if (formData) {
        const data = JSON.parse(formData)
        document.getElementById('correo').value = data.email || ''
        document.getElementById('contrasena').value = data.password || ''
    }
}

function loadFormData() {
    const formData = localStorage.getItem('saveFormData')
    if (formData) {
        const data = JSON.parse(formData)
        document.getElementById('nombre').value = data.name || ''
        document.getElementById('apellido').value = data.lastname || ''
        document.getElementById('correo').value = data.phone || ''
        document.getElementById('edad').value = data.email || ''
        document.getElementById('peso').value = data.email || ''
        document.getElementById('talla').value = data.email || ''
    }
}


if (document.getElementById('registration-form')) {
    document.getElementById('registration-form').addEventListener('input', saveFormData)
    document.addEventListener('DOMContentLoaded', loadFormDataRegistration)
}

if (document.getElementById('login-form')) {
    document.getElementById('login-form').addEventListener('input', saveFormData)
    document.addEventListener('DOMContentLoaded', loadFormDataLogin)
}

if (document.getElementById('form')) {
    document.getElementById('form').addEventListener('input', saveFormData)
    document.addEventListener('DOMContentLoaded', loadFormData)
}
