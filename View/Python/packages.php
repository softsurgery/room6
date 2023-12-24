<div class="window closed" data-title="Python3 | Packages" min-width="300px" min-height="300px" max-width="300px" max-height="300px" togglemax="false">
    <h2>Packages</h2>
    <br>
    <p>Installed Packages:</p>
    <div class="sunken-panel" style="height: 120px; width: 240px;">
        <table class="interactive" style="width: 100%;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Version</th>
                </tr>
            </thead>
            <tbody id="packageList"></tbody>
        </table>
    </div>
    <br>
    <button onclick="displayPackages()">List Packages</button>
    <script>
        function displayPackages() {
            const phpScript = './apps/Python/pip.php';

            fetch(phpScript, {
                    method: 'POST',
                    body: new URLSearchParams({
                        list_packages: true
                    }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('packageList').innerHTML = '<p>Error: ' + data.error + '</p>';
                    } else {
                        let packagesHTML = '';
                        data.forEach(package => {
                            packagesHTML += '<tr> <td>' + package.name + '</td> <td>' + package.version + '</td></tr>';
                        });
                        document.getElementById('packageList').innerHTML = packagesHTML;
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
    </script>


</div>