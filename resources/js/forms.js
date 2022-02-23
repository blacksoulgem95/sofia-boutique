window.submitForm = (formId) => {
    document.getElementById(formId).submit();
};

window.passwordToggle = (id) => {
    const x = document.getElementById(id);
    const i = document.getElementById(id + "_icon");
    if (x.type === "password") {
        x.type = "text";
        i.innerHTML = "<i class='fa-solid fa-eye-slash'></i>";
    } else {
        x.type = "password";
        i.innerHTML = "<i class='fa-solid fa-eye'></i>";
    }
};
