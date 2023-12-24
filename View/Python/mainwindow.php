<script src="./assets/js/apps/python.js"></script>
<div class="window closed" data-title="Python3" min-width="500px" min-height="550px" max-width="700px" max-height="550px" togglemax="false">
    <h2>Python3</h2>
    <br>
    <p>
        🚀 This window brings the power of code compilation directly to your browser. Write, compile, and test your Python code effortlessly.
    </p>
    <div class="field-row-stacked">
        <label for="python-code">Code:</label>
        <textarea id="python-code" name="python-code" rows="13" cols="100">print('Hello World')</textarea>
    </div>
    <br>
    <button onclick="executeCode();">Execute</button>
    <a class="openWindow" data-id="3">
        <button>Packages</button>
    </a>
    <br><br>
    <div class="field-row-stacked">
        <label for="python-code">Output:</label>
        <textarea id="output-container" name="output-container" rows="15" cols="100" readonly>Magic happens here</textarea>
    </div>
</div>