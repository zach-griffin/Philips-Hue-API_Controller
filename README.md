# Philips Hue API Controller
A small PHP app for controlling lights and other Hue devices through the Hue API

This PHP app allows us to tap into the Hue API with a GUI and interact with devices. Feel free to fork and add on as needed. The app requires a valid Hue API token which can be generated using the process outlined in the API-Setup document. The setup process requires physical access to the Hue bridge.

The app must be on the same local network and subnet for it to communicate with the Hue Bridge. This app is best for home-labbers and enthusiasts for giving remote access to Hue products to those who do not have the hue app with account owner permissions, or if you just don't like the Hue app like me.

# My Setup
I run this app in a docker container with a persistent volume on the host. The Hue Bridge is wired to my network and has a static IP address (as does my docker host). I also have a fontawesome account and some references to google fonts that are referenced in the code.

To run this, you will need to make sure you replace all variable that say $bridgeIP and $apiKey with their proper values
