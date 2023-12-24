function openPipPackages() {
    alert("Pip Packages button clicked!");
}

function executeCode() {
    const code = document.getElementById("python-code").value;
    const outputContainer = document.getElementsByName("output-container")[0];
    outputContainer.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../room6/apps/Python/run.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const result = JSON.parse(xhr.responseText);
            if (result.exitCode === 0) {
                if (result.output) outputContainer.textContent = result.output;
                else outputContainer.textContent = "Valid Statement";
            } else {
                outputContainer.textContent = "Error: " + result.output;
            }
        }
    };
    xhr.send("python_code=" + encodeURIComponent(code));
}