import { FaLinkedin } from "react-icons/fa6";
import { FaEnvelope } from "react-icons/fa6";
import { FaPhoneFlip } from "react-icons/fa6";

function Footer(){
    return(
        <>
            <footer>
                <div className="container">
                    <div id="top-footer" className="d-flex">
                        <div id="logo-links" className="d-flex justify-space-between">
                            <div id="footer-logo"><span>REI AREVALO</span></div>
                            <div id="footer-links">
                                <a href="#about">About</a>
                                <a href="#projects">Projects</a>
                                <a href="#contact">Contact</a>     
                            </div>
                        </div>
                        <div id="footer-social">
                            <a target="_blank" href="https://www.linkedin.com/in/ma-angelica-arevalo-b0424a1b1/" className="icons linkedin-icon"><FaLinkedin /></a>
                            <a href="mailto:maangelicaarevalo89@gmail.com" className="icons email-icon"><FaEnvelope /></a>
                            <a href="tel:09952445097" className="icons email-icon"><FaPhoneFlip /></a>
                        </div>
                    </div>
                    <div id="bottom-footer" className="d-flex justify-space-between align-center">
                        <p>@2026 Rei Arevalo. All rights reserved.</p>
                        <p>//Built with WordPress(Headless) + React</p>
                    </div>
                </div>
            </footer>
        </>
    );
}

export default Footer;