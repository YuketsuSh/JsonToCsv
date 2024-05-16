# 🌟 JSON to CSV Converter

A simple PHP project to convert JSON data to CSV format. This project follows the MVC (Model-View-Controller) architecture and includes middleware for JSON validation.

## ✨ Features

- 📜 **JSON Reading:** Read JSON data from a URL or a file path.
- 📄 **CSV Conversion:** Convert JSON data to CSV format with customizable options.
- 🔍 **Field Selection:** Select specific fields to include in the CSV file.
- ⚙️ **Custom Delimiters:** Define custom field delimiters and text enclosures for the CSV file.
- 🚨 **Error Handling:** Proper error handling for JSON reading and conversion issues.

## 🚀 Getting Started

### Prerequisites

- 🐘 PHP 7.4 or higher
- 📦 Composer

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/YuketsuSh/jsontocsv.git
    cd jsontocsv
    ```

2. Install dependencies with Composer:
    ```bash
    composer install
    ```

3. Set up your web server to point to the `public` directory. For example, if you are using Apache, your VirtualHost configuration might look like this:

    ```apache
    <VirtualHost *:80>
        ServerName yourdomain.com
        DocumentRoot /path/to/jsontocsv

        <Directory /path/to/jsontocsv/public>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    ```

4. Ensure your `.htaccess` files are set up correctly:
    - **Root `.htaccess`**:
      ```apache
      RewriteEngine On
      RewriteRule ^$ public/ [L]
      RewriteRule (.*) public/$1 [L]
      ```
    - **Public `.htaccess`**:
      ```apache
      RewriteEngine On
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteRule . index.php [L]
      ```

### 🌐 Usage

1. Open your browser and navigate to your domain.
2. You will see a form with the following fields:
    - **🖇 JSON Source (URL or File Path):** The URL or file path to your JSON data.
    - **🔑 Fields to Include (comma separated):** Specify the JSON keys you want to include in the CSV, separated by commas.
    - **⚙️ Field Delimiter:** The delimiter for the CSV fields (default is a comma `,`).
    - **🔒 Text Enclosure:** The text enclosure for the CSV fields (default is a double-quote `"`).

3. Fill out the form and click "Convert" to download the CSV file.

### 📝 Example

To convert a JSON object with the following structure:

```json
{
    "title": "Contact Us",
    "subtitle": "Get in contact with our team...",
    "description": "Get in touch with the YourName team, for a quote, further information or any other question!",
    "to": "contact@example.net",
    "subject": "Contact from Contact form of YourName",
    "body": "Name: {{name}}\r\nEmail: {{email}}\r\nMessage: {{message}}"
}
```

You can enter the following in the form:

- **🖇 JSON Source (URL or File Path):** `http://example.com/contactus.json`
- **🔑 Fields to Include (comma separated):** `title,subtitle,description,to,subject,body`
- **⚙️ Field Delimiter:** `,`
- **🔒 Text Enclosure:** `"`

Click "Convert" to download the CSV file with the selected fields.

### 🤝 Contributing

Contributions are welcome! Please fork this repository and submit pull requests.

### 📜 License

This project is licensed under the MIT License.

### 🙏 Acknowledgements

Thanks to all contributors and the open-source community for their invaluable support.
