<?php
    require "../bin/Controllers/config.inc.php";
?>
<aside id="aside" class="col-md-4 col-lg-2">
    <nav class="page-sidebar">
        <ul class="nav flex-column ">
            <li class="nav-link active" target="title"><a href="../wb-statistics" style="color:#F15F2B;text-decoration-line:none" class="a">STATISTICS</a>            
                <!-- <ul class="sub-menu">
                    <li class="rounded-pill"><a href="../wb-visitor" style="color:#F8931D;text-decoration-line:none" class="a">Visitor</a></li>
                    <li class="rounded-pill"><a href="../wb-questions" style="color:#F8931D;text-decoration-line:none" class="a">Questions</a></li>
                    <li class="rounded-pill"><a href="../wb-members" style="color:#F8931D;text-decoration-line:none" class="a">Members</a></li>
                </ul> -->
            </li>
            <li class="nav-link active" id="title2"><a href="../wb-question" style="color:#F15F2B;text-decoration-line:none" class="a">QUESTION</a></li>
            <li class="nav-link active" id="title3"><a href="../wb-review" style="color:#F15F2B;text-decoration-line:none" class="a">REVIEW</a>
                <ul class="sub-menu">
                    <li class="rounded-pill">
                        <a href="../wb-unreviewed" style="color:#F8931D;text-decoration-line:none" class="a">Unreviewed</a>
                        <div id="UnreviewedNum" class="prompt align-self-center"></div>
                    </li>
                    <!-- <li class="rounded-pill"><a href="../wb-audited" style="color:#F8931D;text-decoration-line:none" class="a">Audited</a></li> -->
                </ul>
            </li>
            <li class="nav-link active" id="title2"><a href="../wb-more" style="color:#F15F2B;text-decoration-line:none" class="a">MORE</a></li>
        </ul>
    </nav>
</aside>