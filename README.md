# Philips Hue API Controller
A small PHP web app for controlling lights and other Hue devices through the Hue API

This PHP app allows us to tap into the Hue API with a GUI and interact with devices. The app requires a valid Hue API token which can be generated using the process outlined in the API Setup section. The setup process requires physical access to the Hue bridge.

The application server must be on the same local network and subnet for it to communicate with the Hue Bridge. This app is best for home-labbers and enthusiasts for giving remote access to Hue products to those who do not have the hue app with account owner permissions, or if you just don't like the Hue app like me.

# My Setup
I run this app in a docker container with a persistent volume on the host. The Hue Bridge is wired to my network and has a static IP address (as does my docker host). I also have a fontawesome account and some references to google fonts that are referenced in the code.

To run this, you will need to make sure you replace all variable that say $bridgeIP and $apiKey with their proper values

# API Setup
Phillips Hue provides some great documentation here: https://developers.meethue.com/develop/get-started-2/

In short, you need to find the IP address of your Hue Bridge (and set it statically if possible). You can then use the built in tool at **https://bridge-ip-address/debug/clip.html** to get your token and test the API actions.
  
Once you have opened the clip.html page, you can press the big circle button on the bridge. Back at the web tool we are going to type in the below code in the message body and press **POST**. You can also rename "hue_api_app" to whatever you want but it should be recognizable for future reference.
  
```sh
{"devicetype":"hue_api_app"}
```

Now in the command response, you should get something like this:

```sh
[
  {
    "success": {
      "username":"086c23aea938ac83bf692f3e63149b99"
    }
  }
]
```

And thats it! You can now submit GET's and PUT's to your hearts desire. There are a few examples in the next section.

# API Examples

## Get All Lights
```sh
METHOD: GET
ADDRESS:https://bridge_ip_address/api/YOUR-API-TOKEN/lights
```
## Get A Specific Light
```sh
METHOD: GET
ADDRESS:https://bridge_ip_address/api/YOUR-API-TOKEN/lights/LIGHT-NUMBER
```
## Turn A Light On
```sh
METHOD: PUT
ADDRESS:https://bridge_ip_address/api/YOUR-API-TOKEN/lights/LIGHT-NUMBER/state
BODY:   {on:"true"}
```
## Turn A Light Off
```sh
METHOD: PUT
ADDRESS:https://bridge_ip_address/api/YOUR-API-TOKEN/lights/LIGHT-NUMBER/state
BODY:   {on:"false"}
```
## User Interface
<img width="989" alt="Screen Shot 2021-04-24 at 15 10 00" src="https://user-images.githubusercontent.com/36248109/115970496-adde0300-a510-11eb-9a42-6ced1e3b23ab.png">
