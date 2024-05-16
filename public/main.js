document.getElementById('jsonToCsvForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const sourceUrl = document.getElementById('sourceUrl').value;
    const sourceFile = document.getElementById('sourceFile').files[0];
    const fields = document.getElementById('fields').value;
    const delimiter = document.getElementById('delimiter').value;
    const enclosure = document.getElementById('enclosure').value;

    const formData = new FormData();
    if (sourceUrl) {
        formData.append('sourceUrl', sourceUrl);
    } else if (sourceFile) {
        formData.append('sourceFile', sourceFile);
    } else {
        alert('Please provide a JSON URL or upload a JSON file.');
        return;
    }
    formData.append('fields', fields);
    formData.append('delimiter', delimiter);
    formData.append('enclosure', enclosure);

    fetch('/convert', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (response.headers.get('Content-Type').includes('application/json')) {
                return response.json().then(err => {
                    throw new Error(err.error);
                });
            } else {
                return response.blob();
            }
        })
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'output.csv';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => alert('Error: ' + error.message));
});
