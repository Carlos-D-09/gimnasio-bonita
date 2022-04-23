let input = document.querySelector(".inputPatron");
let button = document.querySelector(".buttonPatron");
button.disabled = true;
input.addEventListener("change", stateHandle);
function stateHandle() {
    if (input.value === "") {
        button.disabled = true;
    } else {
        button.disabled = false;
    }
}
