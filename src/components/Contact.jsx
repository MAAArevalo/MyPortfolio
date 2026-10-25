import { FaEnvelope } from "react-icons/fa6";
import { FaPhone } from "react-icons/fa6";

function Contact(){
    return(
        <>
            <section id="contact">
                <div className="container">
                    <div className="content d-flex align-items">
                        <div className="contact-content">
                            <span className="dash"></span>
                            <p className="d-inline sub-title">LET'S WORK TOGETHER</p>
                            <h2>HAVE A PROJECT IN MIND?</h2>
                            <p>Let's discuss how I can help you with your website.</p>
                        </div>
                        <div className="contact-ctas d-flex align-center">
                            <a className="cta" href="mailto:maangelicaarevalo89@gmail.com"><FaEnvelope /> Email Me</a>
                            <a className="cta" href="tel:09952445097"><FaPhone/> Call Me</a>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Contact;