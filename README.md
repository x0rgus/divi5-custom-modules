# Divi 5 Custom Modules

A collection of custom modules for Divi 5.

## Modules
- **Typewriter Text**: A lightweight typewriter animation module built with React for the Visual Builder and PHP for frontend rendering.

## Requirements
- **Docker**: For running the local WordPress environment.
- **Node.js**: (v20+) for build scripts.

## Local Development Workflow

### 1. Setup Environment
First, install the dependencies:
```bash
npm install
```

### 2. Start WordPress (Docker)
Start the local WordPress instance using `wp-env`:
```bash
npm run start
```

## Cloning a Specific Plugin (Production)
The production-ready plugin (including compiled build assets) is automatically maintained in the `dist` branch. 

**Note**: To avoid conflicts with existing plugins in the WordPress repository, we recommend cloning into a custom folder like `divi5-typewriter`:

```bash
cd wp-content/plugins
git clone -b dist https://github.com/x0rgus/divi5-custom-modules.git divi5-typewriter
```
