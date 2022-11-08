<x-layout>
    <div style="border-style:hidden; border-color:aqua; border-width:3px;">

        <img id="image_HDDimageControl" src="images/background.jpg" align="left" width="667" height="500">
        <div align="center">
            <span
                style="color:rgb(6, 6, 59); font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">About
                Ishi Properties</span></br>

            <hr>
            <span> Have you ever wanted to be part of the booming world of real estates<br> or maybe looking for a place
                for your family? <br>Look no further! <br>Ishi Properties is the place for you! Ishi Properties is a
                private company<br> aimed at providing a platform for home owners to lease their properties<br> and for
                people to buy houses</span></br>
            <span>*********</span>
        </div>

        <div style="clear:both"></div>

        <div style="border-style:hidden; border-color:aqua; border-width:3px;">

            <img id="image_HDDimageControl" src="images/mission.jpg" align="right" width="667" height="500">
            <div align="center">
                <span
                    style="color:rgb(6, 6, 59); font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">Our
                    Mission</span></br>
                <span>To be the leading real estate and homeowner service company <br> Always exceeding our customers’
                    expectations.</span></br>
                <span>********</span>
            </div>

            <div style="clear:both"></div>

            <div style="border-style:hidden; border-color:aqua; border-width:3px; ">
                <img id="image_HDDimageControl" src="images/history.jpg" align="left" width="667" height="500">
                <div align="center">
                    <span
                        style="color:rgb(6, 6, 59); font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">
                        Our History</span></br>
                    <span>Ishi Properties was started by a group of youngsters who saw it inspired by school
                        assignments.<br> Well it worked so well that they decided to go corporate.</span></br>
                    <span>********</span>
                </div>

                <div style="clear:both"></div>

                <div style="border-style:hidden; border-color:aqua; border-width:3px;">

                    <img id="image_HDDimageControl" src="images/values.jpg" align="right" width="667"
                        height="500">
                    <div align="center">
                        <span
                            style="color:rgb(6, 6, 59); font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">Our
                            Values</span></br>
                        <span>*******</span></br>
                        <span>*******</span>
                    </div>

                    <div style="clear:both"></div>
                    <div style="border-style:hidden; border-color:aqua; border-width:3px;">

                        <style>
                            .container {
                                width: 1000px;
                                position: relative;
                                display: flex;
                                justify-content: space-between;
                            }

                            .container .card {
                                position: relative;
                                cursor: pointer;
                            }

                            .container .card .face {
                                width: 300px;
                                height: 200px;
                                transition: 0.5s;

                            }

                            .container .card .face.face1 {
                                position: relative;
                                background: #333;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                z-index: 1;
                                transform: translateY(100px);
                            }

                            .container .card:hover .face.face1 {
                                background: #000540;
                                transform: translateY(0);
                            }

                            .container .card .face.face1 .content {
                                opacity: 0.2;
                                transition: 0.5s;
                            }

                            .container .card:hover .face.face1 .content {
                                opacity: 1;
                            }

                            .container .card .face.face1 .content img {
                                max-width: 100px;
                            }

                            .container .card .face.face1 .content h3 {
                                margin: 10px 0 0;
                                padding: 0;
                                color: #fff;
                                ;
                                text-align: center;
                                font-size: 1.5em;

                            }

                            .container .card .face.face2 {
                                position: relative;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                padding: 20px;
                                box-sizing: border-box;
                                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
                                transform: translateY(-100px);
                            }

                            .container .card:hover .face.face2 {
                                transform: translateY(0);
                            }

                            .container .card .face.face2 .content p {
                                margin: 0;
                                padding: 0;
                                color: black;
                            }

                            .container .card .face.face2 .content a {
                                margin: 15px 0 0;
                                display: inline-block;
                                text-decoration: none;
                                font-weight: 900;
                                color: #333;
                                padding: 5px;
                                border: 1px solid #333;
                            }

                            .container .card .face.face2 .content a:hover {
                                background: #333;
                                color: #fff;
                            }
                        </style>

                        <div class="container">
                            <div class="card">
                                <div class="face face1">
                                    <div class="content">
                                        <img src="images/jude.jpg">
                                        <h3> Jude</h3>
                                    </div>
                                </div>
                                <div class="face face2">
                                    <div class="content">
                                        <p>I have used the product before and it has worked so well </p>
                                        <a href="#"> Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="face face1">
                                    <div class="content">
                                        <img src="images/monicah.jpg">
                                        <h3> Monicah</h3>
                                    </div>
                                </div>
                                <div class="face face2">
                                    <div class="content">
                                        <p> I have used the product before and its splendid</p>
                                        <a href="#"> Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="face face1">
                                    <div class="content">
                                        <img src="images/mark.jpg">
                                        <h3> Mark</h3>
                                    </div>
                                </div>
                                <div class="face face2">
                                    <div class="content">
                                        <p>You all should try this out. Its the best you can ask for </p>
                                        <a href="#"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
