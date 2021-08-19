<?php
/*

 Template Name: Exhibit Timeline

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

<div id="imgModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="modalText"></div>
  <div id="caption"></div>
</div>

<div class="slider">
<div class="slider-container">

  <div class="expand-icon-container">
    <svg class="expand-icon" width="40" height="40" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g filter="url(#filter10_d)">
    <path d="M4.0659 11.0033C4.06768 11.5535 4.51849 11.9981 5.0728 11.9963L14.1058 11.967C14.6601 11.9652 15.108 11.5177 15.1062 10.9674C15.1045 10.4172 14.6536 9.97258 14.0993 9.97438L6.07 10.0004L6.04414 2.02997C6.04235 1.47972 5.59155 1.03512 5.03724 1.03691C4.48293 1.03871 4.03502 1.48623 4.03681 2.03648L4.0659 11.0033ZM5.21845 9.43769L4.35758 10.2978L5.78155 11.7022L6.64242 10.8421L5.21845 9.43769Z" fill="white"/>
    </g>
    <g filter="url(#filter11_d)">
    <path d="M19.3091 2.00304C19.3108 1.45279 18.8628 1.00537 18.3085 1.00369L9.27546 0.976336C8.72115 0.974657 8.27044 1.41936 8.26878 1.96961C8.26711 2.51985 8.71512 2.96728 9.26943 2.96895L17.2988 2.99327L17.2746 10.9637C17.273 11.514 17.721 11.9614 18.2753 11.9631C18.8296 11.9648 19.2803 11.5201 19.282 10.9698L19.3091 2.00304ZM18.7076 3.00803L19.013 2.70665L17.5979 1.29335L17.2924 1.59474L18.7076 3.00803Z" fill="white"/>
    </g>
    <defs>
    <filter id="filter10_d" x="0.0368042" y="1.03691" width="19.0694" height="18.9594" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
    <feOffset dy="4"/>
    <feGaussianBlur stdDeviation="2"/>
    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
    </filter>
    <filter id="filter11_d" x="4.26877" y="0.976331" width="19.0404" height="18.9868" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
    <feOffset dy="4"/>
    <feGaussianBlur stdDeviation="2"/>
    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
    </filter>
    </defs>
    </svg>
  </div>
  <div class="expand-text-container">
    <i class="show-text-icon fas fa-paragraph"></i>
  </div>
  <div class="picture-row">
    <div class="carousel-img">
      <div class="header-container bg-linen">
        <h1 class="header-title">History of Voter Suppression & Felony Disenfranchisement</h1>
        <p>In 2016, Black voter turnout dropped by 7% nationally, birthing many theories as to why
African American voters just “didn’t show up” at such a critical time. <span style="text-decoration: underline;" data-toggle="tooltip" title="https://www.pewresearch.org/fact-tank/2017/05/12/black-voter-turnout-fell-in-2016-even-as-a-record-number-of-americans-cast-ballots/">However, the story
is not that simple.</span> The decline in African American turnout was not a refusal by the
Black voter to participate but a willful and successful attempt – 150 years in the making
– to block them from the ballot box. Many policy decisions throughout history have
blocked millions of Black voters from the ballot box, but no law has had greater long-
term impact than felony disenfranchisement. At last count, <span style="text-decoration: underline;" data-toggle="tooltip" title="According to the Sentencing Project, in 2016 there were an estimated 508,680 voters disenfranchised due to a felony conviction.">nearly 350,000 Virginians
cannot vote due to a felony conviction</span>, <span style="text-decoration: underline;" data-toggle="tooltip" title="https://www.nbc12.com/2019/10/09/civil-rights-restored-more-than-ex-felons-northam-says/">the majority of whom are Black and Brown</span> – a
<span style="text-decoration: underline;" data-toggle="tooltip" title="6 Million Lost Voters: State-Level Estimates of Felony Disenfranchisement, 2016. The Sentencing Project October 2016">restriction put in place centuries ago but exploited after the abolition of slavery to control
and restrict Black voices.</span></p>
      </div>
      <div class="text-container third">
        <h1>1792</h1>
        <p>States first began establishing criminal disenfranchisement in the late 1700s but with
very narrow criteria. In 1792, when Kentucky first inserted a clause into their constitution
adding “bribery, perjury, forgery, or other high crimes and misdemeanors” to the list of
disqualifying factors that would cost you your right to vote, <span style="text-decoration: underline;" data-toggle="tooltip" title="Kentucky constitution 1792">Black people amassing
political or social power was not a concern or a threat.</span> By the end of the Civil War
however, states were already incarcerating Black people <span style="text-decoration: underline;" data-toggle="tooltip" title="Racism &amp; Felony Disenfranchisement: An Intertwined History by Erin Kelley. Brennen Center Report,2019.">at a higher rate than whites.</span> Criminal disenfranchisement was already ripe for exploration.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv1-enslaved-people-map.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv1-enslaved-people-map.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1865</h1>
        <p>The 13th Amendment passed in 1865 and formally abolished slavery on paper.
Suddenly, the now freed but formerly enslaved Black population of Virginia
outnumbered whites in 39 of the 148 counties and <span style="text-decoration: underline;" data-toggle="tooltip" title=" Map of Virginia: Slave Population, 1860 https://www.loc.gov/resource/g3881e.cw1046000/?r=0.453,0.359,0.094,0.044,0">made up at least 20% of the
population in 78 of the counties</span>. For the first time, Black people were given American
citizenship, and Black men were given the ability to vote and hold public office. Over
2,000 Black men were elected in the immediate years following the <span style="text-decoration: underline;" data-toggle="tooltip" title="https://www.history.com/topics/american-civil-war/black-leaders-during-reconstruction">ratification of the
13th , 14th , and 15th amendments</span>. The notable exception of the 13th amendment,
however, was that you could still enslave people legally if they were convicted of a
crime and once convicted of a crime you could be disenfranchised. It was a powerful
one-two punch that was quickly exploited by white leaders to retain power.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1866</h1>
        <p>As the 13th Amendment to the Constitution prohibited slavery and involuntary servitude,
but explicitly exempted those convicted of a crime, states across the South quickly
passed Black Codes – new laws that explicitly applied only to Black people and
subjected them to criminal prosecution for offenses like loitering, breaking curfew,
vagrancy, and not carrying proof of employment.</p>
<p style="font-size: 13px;"><em>Excerpt: Be it enacted by the general assembly, That the overseers of the poor, or other officers
having charge of the poor, or the special county police, or the police of any corporation,
or any one or more of such persons, shall be and are hereby empowered and required,
upon discovering any vagrant or vagrants within their respective counties or
corporations, to make information thereof to any justice of the peace of their county or
corporation, and to require a warrant for apprehending such vagrant or vagrants, to be
brought be before him or some other justice...</em></p>
      </div>
      <div class="img-container">
          <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv2-secretary-of-war.jpg" alt="">
          <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv2-secretary-of-war.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
          <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv3-convict-leasing.jpg" alt="">
          <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv3-convict-leasing.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1870</h1>
        <p>Without a source of free labor, and with a Black population that was quickly growing its
social and political power, the South came up with inventive ways to take advantage of
the loopholes in the 13th amendment and find a quick replacement for enslaved labor.
The practice of “convict leasing” began shortly after the Civil War, where incarcerated
people were leased out to work for private individuals. Minor crimes and fabricated
charges came with fines and fees that forced mostly Black men into labor for an
employer to settle their debt. Often the paperwork and debt records were lost, and the
men were unable to prove their debt had been paid. The results were clear, In 1850, 2%
of people who were incarcerated in Alabama were non-white but by 1870, the non-white
prison population grew to 74% and an astonishing 90% of the <span style="text-decoration: underline;" title="Ballot Manipulation and the 'Menace of Negro Domination'" data-toggle="tooltip">“leased” convict laborers
were Black</span>.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1868 - 1870</h1>
        <p>After the end of the Civil War, US Congress forced former confederate states to write
new state constitutions. In an effort to limit southern states from exploiting the criminal
disenfranchisement loophole in the 15th amendment, Congress mandated a limitation on
what kind of crimes you could <span style="text-decoration: underline;" title="A Chicken-Stealer Shall Lose His Vote: Disfranchisement for Larceny in the South" data-toggle="tooltip">disfranchise people for: felonies.</span> In Virginia, the
commanding Army general ordered that Black men be allowed to vote in the 1867
election of delegates that would go on to write that constitution. Nearly 90% of the
105,832 formerly enslaved African Americans of Virginia cast a ballot. That year,
Virginia <span style="text-decoration: underline;" title="https://www.encyclopediavirginia.org/Disfranchisement" data-toggle="tooltip">elected 24 African Americans to the 1868 Constitutional Convention.</span></p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv4-first-vote.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv4-first-vote.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv5-ballot-box.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv5-ballot-box.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1868 - 1870</h1>
        <p>In Virginia’s first integrated election, ballots were still counted separately in different
ballot boxes for whites and “coloreds.” In 1870, the 15th Amendment was ratified to
extend the right to vote to Black people stating that the right of citizens of the United
States to vote shall not be denied or abridged by the United States or by any state on
account of race, color, or previous condition of servitude.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv6-mill-house.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv6-mill-house.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1868 - 1870</h1>
        <p>In the first constitutional convention following the Civil War, changes were made to
Virginia’s constitution that would open the right to vote to every man age “21 and
over...regardless of race.” The new constitution also outlined a series of ways that
Blacks would be integrated into Virginia society. <span style="text-decoration: underline;" title="http://www.virginiamemory.com/online-exhibitions/exhibits/show/remaking-virginia/voting/constitutional-convention" data-toggle="tooltip">Among those rights was the ability to
testify in court and attend public school.</span> This racist broadside was published by
opponents of the reformist constitution to incite fear into white Virginia voters by
conjuring images of what giving this kind of political and social power to Black people
would mean. Ultimately the new Virginia constitution was ratified in 1869 and the new
General Assembly included 27 African Americans.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1870 - 1901</h1>
        <p>Over the next three decades, fearful of “Black rule,” the 11 former confederate states
schemed to come up with ways to disfranchise Black voters and reclaim white political
supremacy. The challenge was how to do it without violating the 15th Amendment of the
US Constitution. Each effort followed a familiar pattern - identify a racially neutral trait or
circumstance (income status, conviction of crimes, illiteracy) and determine voting
eligibility based on that trait.</p>
<p>Across the South, laws were passed to intentionally block Black people’s access to the
ballot. Blacks were increasingly convicted of crimes at higher rates, barring their access
to the ballot through minor criminal disenfranchisement. During this time, Virginia
passed a blatantly racist law targeting the low socioeconomic status of Black Virginians
requiring payment of a “poll tax” six months in advance in order to vote. Notice that the
image below is from the 1950s. While the poll tax was briefly repealed by the General
Assembly after its initial passage in 1876, it was reinstated in 1902 and continued in
Virginia <span style="text-decoration: underline;" data-toggle="tooltip" title="https://www.encyclopediavirginia.org/Disfranchisement">until it was proven unconstitutional in the late 1960s.</span></p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv7-arlington-poll-tax.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv7-arlington-poll-tax.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv8-daily-dispatch-scaled.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv8-daily-dispatch-scaled.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1876</h1>
        <p>In 1876, Virginia expanded the list of crimes that would cost you your right to vote to
include petty larceny, <span style="text-decoration: underline;" title="Twice Condemned: Slaves and the Criminal Laws of Virginia" data-toggle="tooltip">a crime that constituted most felony convictions for enslaved
people in the 1800s.</span> The next year, the legislature passed a law that required lists of voters convicted of any
of the disenfranchising crimes be delivered to county registrars. A Richmond-based
newspaper at the time wrote, <span style="text-decoration: underline;" title="The Daily Dispatch, Nov. 4,1883, Chronicling America: Historic American Newspapers" data-toggle="tooltip">“We publish elsewhere a list of negroes convicted of petit
larceny,” advising that “Democratic challengers should examine it carefully.</span></p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1880</h1>
        <p>By 1880, at least 13 states — more than a third of the country’s 38 states at the time —
had <span style="text-decoration: underline;" data-toggle="tooltip" title="https://www.aclu.org/blog/voting-rights/racist-roots-denying-incarcerated-people-their-right-vote">passed broad felony disenfranchisement laws in their constitution or legislature.</span> 16
By 1900, a new constitutional convention was called so Virginia could join the ranks.
This constitution had a very explicit purpose: to <span style="text-decoration: underline;" title="Debates of the Constitutional Convention of Virginia, 3032" data-toggle="tooltip">“purify” and block Black people from the
ballot.</span> In the words of Lynchburg Delegate Carter Glass, they would “discriminate to
the very extremity...permissible...under the Federal Constitution, with a view to the
elimination of every negro voter who can be gotten rid of, legally, <span style="text-decoration: underline;" title="Debates, 3076" data-toggle="tooltip">without materially
impairing the numerical strength of the white electorate.</span></p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv9-no-white-man.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv9-no-white-man.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv10-black-general-assembly.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv10-black-general-assembly.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <h1>1901-1902</h1>
        <p>When delegates came together in June of 1901, they followed in the footsteps of states
like Mississippi and Alabama that had legislated discriminatory laws, expanded criminal
disenfranchisement, and introduced arbitrary voting eligibility requirements such as
literacy and good character tests. These laws had a devastating and intentional impact
on the Black vote. Virginia did the same with the goal of <span style="text-decoration: underline;" title="Debates, 3076 – Carter Glass" data-toggle="tooltip">“eliminat[ing] the darkey as a
political factor in this state in less than five years, so that in no single county…will there
be the least concern felt for the complete supremacy of the white race in the affairs of
government.”</span> The photo shows Black members of Virginia’s General Assembly in
1887/1888. Only a few years later, the General Assembly was all white.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1902</h1>
        <p>After the ratification of Virginia’s new constitution in 1902, Black turnout dropped 90%.
  The reinstatement of the poll tax, the adoption of a literacy requirement, and the
  addition of “any felony” conviction to the list of disqualifications to vote, among countless
  other suppression tactics, <span style="text-decoration: underline;" title="https://www.encyclopediavirginia.org/Disfranchisement" data-toggle="tooltip">had an immediate and devastating effect on Black voters</span>.
  These voter suppression efforts were combined with cruel and horrific acts of racial
  terror across the South -all in an effort to keep Black voters from exercising their right to
  vote by any means. In Mississippi, approximately 67% of African American adults were
  registered to vote in 1867. <span style="text-decoration: underline;" title="U.S. Commission on Civil Rights, Voting in Mississippi" data-toggle="tooltip">By 1955, it was only 4.3%.</span></p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv10-mississippi-infograph.png" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv10-mississippi-infograph.png'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv12-old-photo.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv12-old-photo.jpg'); background-position: center; background-size: cover;"></div>
      </div>
      <div class="text-container">
        <p>The next 60 years played out as it was designed – Black voters were rampantly
disenfranchised and blocked from gaining significant social or political power
nationwide, but especially in the South. By the 1940s, it was estimated that 10 million
<span style="text-decoration: underline;" title="One Person No Vote, 9" data-toggle="tooltip">Americans were disenfranchised simply because they could not pay the poll tax in their
state.</span> No substantive changes came until the passage of the Voting Rights Act in
1965, which reduced the voting age from 21 to 18 and instituted many reforms geared
toward scaling back these discriminatory actions.</p>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1940</h1>
        <p>It was not until 1940, on the heels of media investigations and other reports of the
horrific conditions being endured by “leased convicts,” like the one on the right reported in the Birmingham News, that the practice of convict
leasing or peonage was abolished. While this ended the wholesale practice of people
who were incarcerated being “sold” to plantations, mining, railroad, steel, and other
companies, it did not end the practice of using people in prisons for free labor, which still
exists today.</p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv14-birmingham-news.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv14-birmingham-news.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>1965</h1>
        <p>The Voting Rights Act of 1965 was a landmark piece of federal legislation in the United
States that prohibited racial discrimination in voting. It was signed into law by President
Lyndon B. Johnson during the height of the civil rights movement on August 6, 1965,
and Congress later amended the act five times to expand its protections. Designed to
enforce the voting rights guaranteed by the 14th and 15th Amendments to the United
States Constitution, the act secured the right to vote for people of all races throughout
the country, especially in the South.</p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv14-protest-scaled.jpg" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv14-protest-scaled.jpg'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <h1>2013</h1>
        <p>In the 2013 Shelby v. Holder decision, the Supreme Court invalidated a decades-old
“coverage formula” naming jurisdictions that had to pass federal scrutiny of their voting
laws under the Voting Rights Act. Due to these jurisdiction’s history of discrimination, in
order to pass any new elections or voting laws they would need to have what is referred
to as “preclearance.” Not surprisingly, many states adopted voter identification, voter
registration laws, and voting processes that made voting harder, especially for poor
people, people of color, and elderly people. Virginia signed into law a photo-ID
requirement that eliminated many forms of previously acceptable IDs – a law which
stayed in place until July 2020.</p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv16-shelby-holder.png" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv16-shelby-holder.png'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <p>The authority to restore voting rights lies only in the governor’s hands, a right assigned
to the role in the 1868 Constitution. While the total number of people who remain
disenfranchised in Virginia is likely lower due to individual rights restoration work that
happened after 2016, there is still a large disenfranchised population, and we are still
stripping every person convicted of a felony of their right to vote. <span style="text-decoration: underline;" title="https://vadoc.virginia.gov/media/1458/vadoc-offender-population-forecasts-2020-2025.pdf" data-toggle="tooltip">That is adding
approximately 12,000 new people per year to the disenfranchised population.</span>
To this day, Virginia remains one of only three states that permanently disenfranchises
people with a felony conviction, maintaining one of the longest legacies of racial
discrimination at the ballot box in America.</p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv17-felony-disenfranchisement-map_edit-e1602815476241.png" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv17-felony-disenfranchisement-map_edit-e1602815476241.png'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
    <div class="carousel-img">
      <div class="text-container">
        <p>While Virginia has done work to rid its current constitution of some of these explicitly
    racist ideas, it is far from done. Felony disenfranchisement was not highly debated in
    1902 - it was considered a given that Blacks were more likely to be convicted of crimes.
    Hundreds of thousands of Virginians have been disenfranchised as a result of a felony
    conviction. The vast majority are Black, out of prison, and off probation. These are
    everyday people, people like you and me, who have had their political voice silenced
    because of a Commonwealth that refuses to shed itself of its racist roots.</p>
      </div>
      <div class="img-container">
        <img src="https://rvalibrary.org/wp-content/uploads/2020/10/btv18-disenfranchisement-rates.png" alt="">
        <div class="bg-image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/10/btv18-disenfranchisement-rates.png'); background-position: center; background-size: cover;"></div>
      </div>
    </div>
  </div>

  <div class="caption-container">

  </div>

   <div class="dot-container">

  </div>


  <div class="arrow-container left-arrow-container">
    <svg class="left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
    </svg>
  </div>
  <div class="arrow-container right-arrow-container">
    <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
    </svg>
  </div>
</div>
</div>

<?php get_template_part('template-parts/content', 'related-links'); ?>

<?php get_footer(); ?>
