import "./Home.css";
import image from "./images/kiet-logo.png";

function Home() {
  return (
    <div>
      <section className="top-marquee">
        {/* header part with marquee */}
        <marquee behaviour="scroll" scrollamount="4" direction="horizontal">
          &gt;&gt; REGISTRATION IS ON GOING &lt;&lt;
        </marquee>
      </section>
      <section className="mid-body">
        <div className="logo-div">
          <div className="logo-inner">
            <img src={image} alt="KIET Logo" className="kiet-logo" />
            <div>
              <div className="logo-name">KIET</div>
              <div className="logo-dtls">GROUP OF INSTITUTIONS</div>
            </div>
          </div>
          <div className="presents">PRESENTS</div>
        </div>
        <div className="event-title-div">
          <div className="event-title">SprintHacks-2k23</div>
        </div>
        <div className="event-status">Event Status</div>
      </section>
      <section className="login-div">
        <a href="" className="login-btn">
          LOGIN
        </a>
      </section>
    </div>
  );
}

export default Home;
