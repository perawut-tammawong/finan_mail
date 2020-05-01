<html>
<script type="text/javascript" src="https://alcdn.msftauth.net/lib/1.2.1/js/msal.js" integrity="sha384-9TV1245fz+BaI+VvCjMYL0YDMElLBwNS84v3mY57pXNOt6xcUYch2QLImaTahcOP" crossorigin="anonymous"></script>
<script>
// Config object to be passed to Msal on creation
const msalConfig = {
  auth: {
    clientId: "6a8ca79a-2bef-4582-8c3a-e02fcd2b0379", // this is a fake id
    authority: "https://login.microsoftonline.com/common",
    redirectUri: "http://localhost:3000/",
  },
  cache: {
    cacheLocation: "sessionStorage", // This configures where your cache will be stored
    storeAuthStateInCookie: false, // Set this to "true" if you are having issues on IE11 or Edge
  }
};

const myMSALObj = new Msal.UserAgentApplication(msalConfig);
</script>
<body>
</body>
</html>
