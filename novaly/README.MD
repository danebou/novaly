# Novaly

### Setup
Add these settings to your hosts file
Windows: `C:\Windows\System 32\drivers\etc\hosts`
Linux/macOS: `/etc/hosts`

```
127.0.0.1	novaly.dev
127.0.0.1	adminer.dev
127.0.0.1	localunixsocket         # Needed on macOS
127.0.0.1	localunixsocket.lan     # Needed on macOS
127.0.0.1	localunixsocket.local   # Needed on macOS
```

### Loading Branch
Once a branch is loaded, run the following build script
`./build.sh`

### Compiling CSS Changes
`npm run dev`
