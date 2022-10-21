<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h1 align="center">AIIR</h1>

  <p align="center">
    Air Information Interface with Remote Access
    <br />
    <br />
    <br />
</div>


<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#Data/Function-Flow">Data/Function Flow</a></li>
    <!--<li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>-->
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![Homepage](https://i.imgur.com/skn74Gg.png)

<p align="right">(<a href="#readme-top">back to top</a>)</p>


### Built With

* PHP
* HTML
* CSS
* Python3
* C

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- GETTING STARTED -->
## Getting Started

To replicate this project, you simply have to download the Arduino file "sensors.io" and the Raspbian image for the Raspberry Pi "raspimg.iso". It is recommended you follow the wiring diagram before you start programming your boards. You will also need the Raspberry Pi imager, linked <a href="https://www.raspberrypi.com/software/">here</a>. 

I have preconfigured the Raspberry Pi to have the following config parameters:
* SSH enabled (Username "pi", password "pi")
* I2C and SPI enabled
* Preconfigured IP address of 10.0.0.238 (Easily changed if you wish)
* On reboot, launch the "launcher.sh" program, which pings the webserver to grab the sensor data from the Arduino
* Apache2 will also autostart on reboot

To build this project, I used:
* Arduino Uno R3 (Any arduino will work fine. I recommend Leonardo or Micro, as they are the cheapest)
* Raspberry Pi 3 Model B (Any pi will work fine. I recommend any the Pico W, as they are extremely cheap)
* Generic breadboard
* DHT22 sensor (from Core Electronics. DHT11 will also work fine)
* SGP30 sensor (from Core Electronics. Any other sensor will need reprogramming)
* Some jumper wire and a debug LED
* Ender 3 V2 3D printer (Any printer will work fine)

### Prerequisites

They are automagically preinstalled! That is, only if you use the "raspimg.iso" file provided, which I highly recommend to prevent debugging theatrics. If you are using a clean Rasp Pi image, follow the steps below:

* Update
  ```sh
  sudo apt-get update && sudo apt-get upgrade -y
  sudo apt-get autoremove -y
  ```
  
* Python3
  ```sh
  sudo apt install python3
  ```
  
* Apache2 (Comes with HTML/PHP/CSS support)
  ```sh
  sudo apt install apache2
  ```
  
Note: 
* The Arduino natively supports C so there is no need to update it or install it
* You will need to download the latest Arduino IDE for your computer, found <a href="https://www.arduino.cc/en/software/">here</a>

### Installation

1. Wire up the sensors as shown below

![Wiring Diagram](https://i.imgur.com/YZO90iD.png)

Note: The Arduino is simply connected to the Rasp Pi using any USB port and the provided cable for the Arduino that is also used to program it

2. Clone the repo using your terminal (CMD on Windows)
   ```sh
   git clone https://github.com/rxdx33/aiir.git
   ```
3. (ONLY If not using supplied Raspberry Pi iamge) Install prerequisites packages shown above
   ```sh
   sudo apt-get update && sudo apt-get upgrade -y
   sudo apt-get autoremove -y
   sudo apt install python3
   sudo apt install apache2
   ```
4. Open Arduino IDE and select "Open..." under "File" in the top left hand side of the toolbar. From here, open "sensors.ino"

5. Select "Tools" from the toolbar, and ensure you have the right "Board" and "Port" option selected. Board should match your board, in my case "Arduino Uno". For port, it will say your board's name, in my case "COM3: Arduino"
 
![Arduino IDE](https://i.imgur.com/xIV3cLK.png)

6. Select "Upload" shown here. You can open the Serial Monitor if you wish, using CTRL + SHIFT + M


![Upload](https://i.imgur.com/mbj3Gve.png)


7. Open Raspberry Pi Imager on your pc. Click "CHOOSE OS" and then "CUSTOM", select the "raspimg.iso" file provided. 

8. Select storage device (SD card from Pi) by clicking "CHOOSE STORAGE". Only your sd card should show up but be careful as it'll format all your card! 

9. Press "WRITE" and take a coffee break.


![Pi](https://i.imgur.com/l1dGPUW.png)


10. Plug the Arduino cable into the Raspberry Pi (USB to Arduino cable) and insert power cable to the Pi.

11. All done! Wasn't that seamless?


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Simply plug the Raspberry Pi in to power and you are done! The launcher.sh script automagically runs the serial communication script between the Arduino and the Pi!

<a href="http://10.0.0.238/app.php">Visit your dashboard by clicking me!</a>

Note: If the above link doesn't work, that simply means your Pi has a different IP address than the one configured above. Simply replace the IP address with your Pi's address to fix this

_For more examples, please refer to the Apache2 [Documentation](https://httpd.apache.org/)_



<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [ ] Implement graphs for nerds (see: developers)
- [ ] Save logs using crontab to have a backlog of previous stats
- [ ] Implement images for each variable, to be a more visually pleasing experience



<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE 
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p> -->



<!-- CONTACT -->
## Data/Function Flow

![Flow](https://i.imgur.com/JmXzT1o.png)

<p align="right">(<a href="#readme-top">back to top</a>)</p> -->



<!-- ACKNOWLEDGMENTS
## Acknowledgments

* []()
* []()
* []() -->

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[PHP]: https://img.shields.io/badge/-PHP-blue?style=flat-square&logo=php
[PHP-url]: https://php.net
[HTML]: https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white
[HTML-url]: html.com
[Python]: https://img.shields.io/badge/-Python-green
[Python-url]: python3.com
[C]: https://img.shields.io/badge/-C-lightgrey
[C-url]: learn-c.org
