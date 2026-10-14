const fs = require('node:fs');
const path = require('node:path');

const projectRoot = path.resolve(__dirname, '..');
const source = path.join(projectRoot, 'node_modules', 'bootstrap', 'dist');
const target = path.join(projectRoot, 'public', 'assets', 'vendor', 'bootstrap');

fs.mkdirSync(target, { recursive: true });
for (const file of ['css/bootstrap.min.css', 'js/bootstrap.bundle.min.js']) {
  const sourceFile = path.join(source, file);
  const targetFile = path.join(target, path.basename(file));
  fs.copyFileSync(sourceFile, targetFile);
}

console.log('Bootstrap assets copied to public/assets/vendor/bootstrap.');
