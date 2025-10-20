function togglePassword(id, el) {
    const input = document.getElementById(id);
    const eyes = el.querySelectorAll('.eye');
    const isHidden = input.type === "password";
    input.type = isHidden ? "text" : "password";
    eyes[0].style.display = isHidden ? "none" : "block";
    eyes[1].style.display = isHidden ? "block" : "none";
}