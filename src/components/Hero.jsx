import { FaLinkedin } from "react-icons/fa6";
import { FaEnvelope } from "react-icons/fa6";
import { FaPhoneFlip } from "react-icons/fa6";



function Hero(){
    return(
        <>
        <section className="banner" id="hero">
            <div className="container">
                <div className="content">
                    <span className="dash"></span>
                    <p className="d-inline sub-title">HELLO, I'M</p>
                    <h1>REI AREVALO</h1>
                    <p>I help businesses and individuals build, improve, and maintain their WordPress websites.</p>
                    <div id="hero-cta">
                        <a href="https://wpbackend.aarevalo.site/wp-content/uploads/2026/10/Resume-Arevalo.pdf" download className="cta moss-bg moss-border">View Resume</a>
                        <a href="tel:09952445097" className="cta moss-border bg-transparent">Let's Talk</a>
                    </div>
                    <div className="social-icons" id="hero-icons">
                        <a target="_blank" href="https://www.linkedin.com/in/ma-angelica-arevalo-b0424a1b1/" className="icons linkedin-icon"><FaLinkedin /></a>
                        <a href="mailto:maangelicaarevalo89@gmail.com" className="icons email-icon"><FaEnvelope /></a>
                        <a href="tel:09952445097" className="icons email-icon"><FaPhoneFlip /></a>
                    </div>
                </div>
            </div>
        </section>
        </>
    );
}

export default Hero;