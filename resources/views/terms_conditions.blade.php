<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .m-t-md {
            margin-top: 50px;
        }
    </style>

</head>
<body >
<div class="container">
    @if (Route::has('login'))
        <div class="col-md-12">
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
            </div>
        </div>
    @endif

    <div class="row m-t-md  ">

        <div class="col-md-12">
            <h1>Terms and Conditions</h1>
            <p></p>
        </div>

        <div class="col-md-12">
            <p style="white-space: pre-wrap">
                "Legal Terms of Service
                Date of Last Revision: July 2nd, 2018

                Please Read Carefully Before Using This Website: The following terms of service (“Terms of Service”) govern your use of the {{ config('app.name', 'Laravel') }} Website (the “Site”) and the {{ config('app.name', 'Laravel') }} web-based, application integration and data linking service accessed through the Site (“Service”), both of which are operated by {{ config('app.name', 'Laravel') }}, Inc. (“{{ config('app.name', 'Laravel') }}” or “we”). By using the Site and/or the Service, you irrevocably agree that such use is subject to these Terms of Service. If you do not agree to these Terms of Service, you may not use the Site or the Service. If you are entering into these Terms of Service on behalf of an entity, you are binding such entity to these Terms of Service, you represent that you have the actual authority to bind such entity to these Terms of Service, and references to “you” mean such entity.

                {{ config('app.name', 'Laravel') }} expressly reserves the right to modify the Terms of Service at any time in its sole discretion by including such alteration and/or modification in these Terms of Service, along with a notice of the effective date of such modified Terms of Service. If a revision meaningfully reduces your rights, we will use reasonable efforts to notify you (by, for example, sending an email to the billing contact you designate in your User Account (as defined below), through your User Account or in the Service itself). To the extent you have purchased a subscription to the Service, the modified terms will be effective as to such subscription Service upon your next subscription renewal. In this case, if you object to the updated terms, as your exclusive remedy, you may choose not to renew, including cancelling any terms set to auto-renew. In all other cases, any continued use by you of the Site or the Service after the posting of such modified Terms of Service shall be deemed to indicate your irrevocable agreement to such modified Terms of Service. Accordingly, if at any time you do not agree to be subject to any modified Terms of Service, you may no longer use the Site or Service.

                User Account Registration; Passwords
                (a) Account Registration and Use License: In order to access and use all of the features of the Service, you are required to open an account (“User Account”) by registering with {{ config('app.name', 'Laravel') }}. When you register for your User Account you must provide true, accurate, current and complete information (“Account Information”), and you agree to update the Account Information in order to ensure that it is current. Upon proper registration and opening of a User Account, and subject to all of the terms and conditions of these Terms of Service, {{ config('app.name', 'Laravel') }} hereby grants to you the personal, non-transferable right and license to use the Service, solely for your own internal business purposes, until such time as either you or {{ config('app.name', 'Laravel') }} elect to terminate such right in accordance with these Terms of Service.

                (b) Eligibility: As an express condition of being permitted to open a User Account, you represent and warrant that you (i) have the legal capacity (including, without limitation, being of sufficient age) to enter into contracts under the law of the jurisdiction in which you reside, (ii) are not on a list of persons barred you from receiving services under U.S. laws (including, without limitation, the Denied Persons List and the Entity List issued by the U.S. Department of Commerce, Bureau of Industry and Security) or other applicable jurisdiction and (iii) are not a resident of Cuba, Iran, North Korea, Sudan or Syria.

                (c) Passwords: Upon registration on the Site, you will provide {{ config('app.name', 'Laravel') }} with a password to access your account. You are responsible for maintaining the confidentiality of your password and for all of your activities and those of any third party that occur through your account, whether or not authorized by you. You agree to immediately notify {{ config('app.name', 'Laravel') }} of any suspected or actual unauthorized use of your User Account. You agree that {{ config('app.name', 'Laravel') }} will not under any circumstances be liable for any cost, loss, damages or expenses arising out of a failure by you to maintain the security of your password.

                Site Content
                (a) {{ config('app.name', 'Laravel') }} Content: The information, materials (including, without limitation, HTML, text, audio, video, white papers, press releases, data sheets, product descriptions, software and FAQs and other content) available on the Site and/or the Service, excluding Third Party Content (collectively, “{{ config('app.name', 'Laravel') }} Content”), are the copyrighted works of {{ config('app.name', 'Laravel') }}, and {{ config('app.name', 'Laravel') }} expressly retains all right title and interest in and to the {{ config('app.name', 'Laravel') }} Content, including, without limitation, all intellectual property rights therein and thereto. Except as expressly permitted in these Terms of Service, any use of the {{ config('app.name', 'Laravel') }} Content may violate copyright and/or other applicable laws.

                (b) Third Party Content: In addition to {{ config('app.name', 'Laravel') }} Content, the Site and/or the Service may contain information and materials provided to {{ config('app.name', 'Laravel') }} by third parties (collectively, “Third Party Content”). Third Party Content is the copyrighted work of its owner, who expressly retains all right title and interest in and to the Third Party Content, including, without limitation, all intellectual property rights therein and thereto. In addition to being subject to these Terms of Service, Third Party Content may also be subject to different and/or additional terms of use and/or privacy policies of such third parties. Please contact the appropriate third party for further information regarding any such different and/or additional terms of use applicable to Third Party Content.

                (c) Limited Site Content License: {{ config('app.name', 'Laravel') }} grants you the limited, revocable, non-transferable, non-exclusive right to use the {{ config('app.name', 'Laravel') }} Content and Third Party Content (collectively, “Site Content”) by displaying the Site Content on your computer, and downloading and printing pages from the Site containing Site Content, under the condition that (i) such activity is solely for your personal, education or other noncommercial use, (ii) you do not modify or prepare derivative works from the Site Content, (iii) you do not obscure, alter or remove any notice of copyright set forth on any Site pages or Site Content, (iv) you do not otherwise reproduce, re-distribute or publicly display any of the Site Content and (v) you do not copy any Site Content to any other media or other storage format.

                (d) Trademarks: All trademarks, service marks and logos included on the Site (“Marks”) are the property of {{ config('app.name', 'Laravel') }} or third parties, and you may not use such Marks without the express, prior written consent of {{ config('app.name', 'Laravel') }} or the applicable third party

                (e) Monitoring of Site Content and use of Service: {{ config('app.name', 'Laravel') }} reserves the right, but does not undertake the obligation, to monitor use of the Site and/or the Service, and to investigate and take appropriate legal action against any party that uses the Site in violation of these Terms of Service or applicable law. {{ config('app.name', 'Laravel') }} reserves the right to accept, reject or modify any Site Content or User Content, but assumes no liability based on its acceptance, rejection, modification or failure to modify any Site Content or User Content.

                (f) Copyright Infringement: As a condition of your right to use the Site and the Service, you agree to respect the intellectual property rights of others. Accordingly, you agree not to upload or post to the Site or the Service any copyrighted materials, trademarks or other proprietary information belonging to any third party without the prior written consent of the applicable third party. You acknowledge that {{ config('app.name', 'Laravel') }} will terminate your access to the Site and/or the Service if you repeatedly infringe the copyright of third parties. If you believe that your copyrighted work has been illegally uploaded or posted on the Site or the Service, you may send a written notice to {{ config('app.name', 'Laravel') }} at admin@{{ config('app.name', 'Laravel') }}.com, and {{ config('app.name', 'Laravel') }} will respond pursuant to its Digital Millennium Copyright Act (“DMCA”) procedure. {{ config('app.name', 'Laravel') }}’s DMCA procedure is in accordance with that suggested by DMCA, the text of which can be found at the U.S. Copyright Office web site http://www.copyright.gov/legislation/dmca.pdf. {{ config('app.name', 'Laravel') }} reserves all rights to seek damages and fees associated with infringement and/or fraud.

                Your Use of the Site and Service
                (a) Account and Use of Service: You may use your User Account for the Service only in accordance with these Terms of Service and only for lawful purposes. You are responsible for your own communications, including the upload, transmission and posting of information, and are responsible for the consequences of their posting on or through the Service.

                (b) Fees: Some features of the Service may only be accessed and used upon the payment of applicable fees (“Fees”). Fees may vary depending on usage in accordance with our current pricing policy. If you do not initially register for a version of the Service that requires the payment of a fee, you will nonetheless be permitted to use all of the features of the Service for a period of fourteen (14) days (“Free Trial Period”). NOTWITHSTANDING ANYTHING CONTAINED HEREIN, ANY SERVICE PROVIDED DURING THE FREE TRIAL PERIOD IS PROVIDED “AS-IS” WITHOUT ANY REPRESENTATIONS, WARRANTIES OR INDEMNITIES. Upon the expiration of the Free Trial Period, you will only be able to access and use those features of the Service the use of which does not require the payment of a Fee, unless you subsequently upgrade to a paid version of the Service. All Fees are exclusive of all taxes, levies, or duties imposed by taxing authorities, and you shall be responsible for payment of all such taxes, levies, or duties, excluding only United States (federal or state) taxes.

                (c) Refunds, Upgrading and Downgrading: Refunds are processed according to our fair refund policy. Any upgrade or downgrade in your Service use will result in the new Fees being charged at the next billing cycle. There will be no prorating for downgrades in between billing cycles. Downgrading your Service may cause the loss of features or capacity of your User Account. {{ config('app.name', 'Laravel') }} does not accept any liability for such loss.

                (d) Cancellation and Termination by You: You are solely responsible for properly canceling your User Account. An email or phone request to cancel your User Account is not considered cancellation. You can cancel your User Account at any time by clicking on the settings link in the global navigation bar at the top of the screen. The settings screen provides a simple no-questions-asked cancellation link. If you cancel your User Account before the end of your current paid up month, your cancellation will take effect immediately, and you will not be charged again. Please note that we do not provide refunds for unused time in the last billing cycle.

                (e) Termination and Suspension by {{ config('app.name', 'Laravel') }}: {{ config('app.name', 'Laravel') }} may terminate your User Account and/or these Terms of Service at any time and for any reason upon notice to you. We may also suspend our Service to you at any time, with or without cause. If we terminate your User Account without cause, we will refund a prorated portion of your monthly prepayment. We will not refund or reimburse you if we terminate your User Account for cause, including (without limitation) for a violation of these Terms of Service.

                (f) Effect of Termination: Once your User Account is terminated, we may permanently delete your User Account and any or all User Content associated with it. If you do not log in to your User Account for 12 or more months, we may treat your User Account as “inactive” and permanently delete the User Account and all the data associated with it. Except where an exclusive remedy may be specified in this Agreement, the exercise by either party of any remedy, including termination, will be without prejudice to any other remedies it may have under these Terms of Service. All sections of this Agreement which by their nature should survive termination will survive, including without limitation, accrued rights to payment, use restrictions and indemnity obligations, confidentiality obligations, warranty disclaimers, and limitations of liability.

                (g) Prohibited Conduct: You agree not to use the Site or the Service for: (i) posting any (1) information which is incomplete, false, inaccurate or not your own, (2) trade secrets or material that is copyrighted or otherwise owned by a third party unless you have a valid license from the owner which permits you to post it, (3) material that infringes on any other intellectual property, privacy or publicity right of another, (4) advertisement, promotional materials or solicitation related to any product or service that is competitive with {{ config('app.name', 'Laravel') }} products or services or (5) software or programs which contain any harmful code, including, but not limited to, viruses, worms, time bombs or Trojan horses; (ii) impersonating another person; (iii) engaging in or encouraging conduct that would constitute a criminal offense, give rise to civil liability or otherwise violate any city, state, national or international law or regulation, or which fails to comply with accepted Internet protocol; or (iv) transmitting or transferring (by any means) information or software derived from the Site or the Service to foreign countries or certain foreign nations in violation of US export control laws. In addition, you agree not to violate or attempt to violate the security of the Site, the Service or {{ config('app.name', 'Laravel') }}’s system or network security, including, without limitation, the following: (w) accessing data not intended for users of the Site or the Service, or gaining unauthorized access to an account, server or any other computer system; (x) attempting to probe, scan or test the vulnerability of a system or network or to breach security or authentication measures; (y) attempting to interfere with the function of the Site, the Service, host or network, including, without limitation, via means of submitting a virus to the Site, overloading, “flooding”, “mailbombing”, “crashing”, or sending unsolicited e-mail, including promotions and/or advertising of products or services; or (z) forging any TCP/IP packet header or any part of the header information in any e-mail or newsgroup posting. Violations of the Site’s, the Service’s or {{ config('app.name', 'Laravel') }}’s system or network security may result in civil or criminal liability.

                In addition, you agree not to, directly or indirectly: (A) reverse engineer, decompile, disassemble or otherwise attempt to discover the source code, object code or underlying structure, ideas or algorithms of the Service or any software, documentation or data related to or provided with the Service (“Software”); (B) modify, translate, or create derivative works based on the Service or Software; or copy (except for archival purposes), rent, lease, distribute, pledge, assign, or otherwise transfer or encumber rights to the Service or Software; (C) use or access the Service to build or support, and/or assist a third party in building or supporting, products or services competitive to {{ config('app.name', 'Laravel') }}; (D) remove any proprietary notices or labels from the Service or Software; or (E) otherwise use the Service or Software outside of the scope of the rights expressly granted herein. You agree to use the Service and Software only for your own internal business operations, and not to transfer, distribute, sell, republish, resell, lease, sublease, license, sub-license or assign the Service or use the Service for the operation of a service bureau or timesharing service.

                (h) Your Data: You will retain ownership of any data, information or material originated by you that you transmit through the Service (""User Content"") – for example, User Content from your accounts with third party services (e.g., Gmail or Dropbox) that passes through the Service. You shall be solely responsible for the accuracy, quality, content and legality of User Content, the means by which User Content is acquired and the transmission of User Content outside of the Service. You represent and warrant that you have all rights necessary to transmit User Content through the Service and to otherwise have User Content used as part of the Service or as otherwise contemplated herein.

                (i) Data Processing Addendum: If you are a paying subscriber to the Service, to the extent that {{ config('app.name', 'Laravel') }} processes any Personal Information (as defined in the DPA) contained in User Content that is subject to the GDPR (as defined in the DPA), on your behalf, in the provision of the Service, the terms of the data processing addendum at http://www.{{ config('app.name', 'Laravel') }}.com/dpa/ (""DPA""), which are hereby incorporated by reference, shall apply and the parties agree to comply with such terms. For the purposes of the Standard Contractual Clauses attached to the DPA, when you are the data exporter, your agreeing to these Terms of Service shall be treated as signing of the DPA, including, without limitation, the Standard Contractual Clauses and their Appendices.

                (j) Your Posts: The Site and Service include functionality that permits users to post content, images, audio files, text, sample code or other materials or works in a manner that is intended to be viewed by other users (“Your Posts”), including for reviews and in forums. You hereby grant to {{ config('app.name', 'Laravel') }} a perpetual, irrevocable, royalty-free, worldwide, non-exclusive right and license, including the right to grant sublicenses to third parties, to use, reproduce, publicly display, publicly perform, prepare derivative works from and distribute Your Posts for any purpose. In addition, you hereby irrevocably represent and warrant to {{ config('app.name', 'Laravel') }} that (i) you have all necessary power, authority, right, title and/or licenses to grant to {{ config('app.name', 'Laravel') }} the foregoing right and license and (ii) the posting, submission and display by you of Your Posts on the Site or Service, and the exercise by {{ config('app.name', 'Laravel') }} of the foregoing license does not and will not (1) violate any applicable law or government regulation or (2) infringe any right of publicity or invades the privacy of others, or any intellectual property right of any third party, (iii) none of Your Posts (1) will constitute obscene, pornographic, indecent, profane or otherwise objectionable material, (2) are discriminatory, hateful or bigoted toward, or abusive of, any group or individual, or (3) are libelous or defamatory.

                (k) Suggestions: You hereby grant to {{ config('app.name', 'Laravel') }} a royalty-free, worldwide, transferable, sublicenseable, irrevocable, perpetual license to use or incorporate into the Site, the Service and/or other {{ config('app.name', 'Laravel') }} offerings any suggestions, enhancement requests, recommendations or other feedback provided by you to {{ config('app.name', 'Laravel') }} that is related to the Site and/or the Service.

                (l) Aggregated and/or Anonymized Data: Notwithstanding anything to the contrary set forth herein or otherwise, {{ config('app.name', 'Laravel') }} will have the right to collect and analyze data and other information relating to the provision, use or performance of the Site and/or Service and related systems and technologies (including information concerning User Data and data derived therefrom), and to aggregate and/or anonymize all such data and information. {{ config('app.name', 'Laravel') }} will be free at any time to: (i) use such information and data to improve and enhance {{ config('app.name', 'Laravel') }}’s offerings; and (ii) disclose such data in aggregate or other de-identified form in connection with its business.

                (m) Your Indemnification Obligations: You hereby irrevocably agree to indemnify, defend and hold {{ config('app.name', 'Laravel') }}, its affiliates, directors, officers, employees and agents harmless from and against any and all loss, costs, damages, liabilities and expenses (including attorneys’ fees) arising out of or related to (i) any third party claim resulting from a breach by you of any of your covenants, representations or warranties contained in these Terms of Use and/or (ii) your use of the Site and/or the Service.

                (n) {{ config('app.name', 'Laravel') }}’s Indemnification Obligations: If you are a paying subscriber to the Service, {{ config('app.name', 'Laravel') }} will defend you against any third party claim brought against you alleging that the use of such paid Service as permitted hereunder infringes the United States intellectual property rights of a third party, and {{ config('app.name', 'Laravel') }} shall pay all costs and damages finally awarded against you by a court of competent jurisdiction as a result of any such claim; provided that you (a) promptly give written notice thereof to {{ config('app.name', 'Laravel') }}; (b) give {{ config('app.name', 'Laravel') }} sole control of the defense and settlement of the claim; and (c) provide to {{ config('app.name', 'Laravel') }} all reasonable assistance. The foregoing shall not apply to any claim based upon or arising from (i) any use of the Service outside the scope of these Terms of Service, (ii) User Content, or (iii) a combination of the Service with any content or other technology not provided by {{ config('app.name', 'Laravel') }}.

                (o) Your Use of The Service to Send Communications: You acknowledge that (a) you exclusively are responsible for and control the timing, content, and distribution of all telephonic or electronic communications made or initiated to any person or entity in connection with your use of the Service and (b) any such communications are made or initiated only as a result of your actions. You further warrant that all telephonic or electronic communications made or initiated in connection with your use of the Service comply with all applicable state and federal laws, including without limitation the Telephone Consumer Protection Act, before you make or initiate any telephonic or electronic communication through the Service.

                (p) Developer Platform: In addition to these Terms of Service, if you use the {{ config('app.name', 'Laravel') }} developer platform to create additional features for the Service that leverage your application programming interfaces, your use of the {{ config('app.name', 'Laravel') }} developer platform is subject to the {{ config('app.name', 'Laravel') }} Developer Platform Agreement located at https://{{ config('app.name', 'Laravel') }}.com/developer/tos/.

                (q) Team Accounts: You may be invited to establish or join a {{ config('app.name', 'Laravel') }} team account (“Team Account”). Each Team Account will have an administrator who can accept or remove Team Account members. By agreeing to join a Team Account, you acknowledge that (i) your identity, including name, email address, and avatar (if any), will be disclosed to other Team Account members, and the Team Account administrator will also have access to your task usage, and (ii) your User Content will be viewable by all Team Account members. You will have the option to share with other Team Account members any integrations you have created and/or any third party applications with which you have connected. If you share an integration, all Team Account members can view and edit such integration. If you share a third party application with which you have connected, all Team Account members will have read/write access to the data associated with such third party application.

                (r) Export Control: You hereby represent and warrant that (i) you understand and acknowledge that some Site Content or components of the Service may be subject to export, re-export and import restrictions under applicable law, (ii) you will not use the Site, any Site Content or the Service in a manner that violates the U.S. Export Administration Act of 1979 and the regulations of the U.S. Department of Commerce and (iii) you are not located in, under the control of, or a national or resident of any country to which the United States has embargoed goods.

                Linked Websites and Services
                The Site and Service contains links to and integrations with third party websites and services (e.g., Gmail or Dropbox), and you agree that {{ config('app.name', 'Laravel') }} provides links to and integrations with such websites and services solely as a convenience and has no responsibility for the content or availability of such websites or services, and that {{ config('app.name', 'Laravel') }} does not endorse such websites or services (or any products or other services associated therewith). Your use of such websites and services will be subject to the terms applicable to each such website and service.

                Service Warranty
                If you are a paying subscriber to the Service, {{ config('app.name', 'Laravel') }} warrants to you that it will provide the Service substantially in accordance with its documentation under normal use. In the event of any breach of such warranty, your exclusive remedy will be {{ config('app.name', 'Laravel') }}’s re-performance of the deficient Service or, if {{ config('app.name', 'Laravel') }} cannot re-perform such deficient Service as warranted, you may terminate your User Account as set forth above and {{ config('app.name', 'Laravel') }} will refund a prorated portion of your monthly prepayment. You must notify {{ config('app.name', 'Laravel') }} in writing of any warranty deficiency within 10 days from receipt of the deficient Service in order to receive the foregoing warranty remedy.

                LIMITATION OF LIABILITY
                (a) Warranty Disclaimer: EXCEPT AS EXPRESSLY SET FORTH IMMEDIATELY ABOVE, THE SITE, SITE CONTENT AND SERVICE ARE PROVIDED STRICTLY ON AN “AS IS” AND “AS AVAILABLE” BASIS, AND {{ config('app.name', 'Laravel') }} MAKES NO WARRANTY THAT THE SITE, SERVICE OR SITE CONENT ARE COMPLETE, SUITABLE FOR YOUR PURPOSE, OR ACCURATE, AND ON BEHALF OF ITSELF AND ITS LICENSORS, {{ config('app.name', 'Laravel') }} HEREBY EXPRESSLY DISCLAIMS ANY AND ALL IMPLIED, STATUTORY OR OTHER WARRANTIES WITH RESPECT TO THE SITE, SITE CONTENT AND SERVICE, OR THE AVAILABILITY OF THE FOREGOING, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NONINFIRNGEMENT. THE ENTIRE RISK AS TO RESULTS OBTAINED THROUGH USE OF THE SITE, SERVICE AND/OR THE SITE CONTENT RESTS WITH YOU AND {{ config('app.name', 'Laravel') }} MAKES NO REPRESENTATION OR WARRANTY THAT THE AVAILABILITY OF THE SITE AND OR THE SERVICE WILL BE UNINTERRUPTED, OR THAT THE SITE, SERVICE AND/OR THE SITE CONTENT WILL BE ERROR FREE OR THAT ALL ERRORS WILL BE CORRECTED.

                (b) Limitation of Liability: TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, YOU AGREE THAT {{ config('app.name', 'Laravel') }} SHALL NOT BE LIABILE TO YOU FOR ANY (A) INDIRECT, INCIDENTAL, CONSEQUENTIAL, PUNITIVE, SPECIAL, EXEMPLARY OR STATUTORY DAMAGES (INCLUDING, WITHOUT LIMITATION, LOSS OF BUSINESS, LOSS OR PROFITS, LOSS OF REVENUE, LOSS OF DATA, LOSS OF GOODWILL OR FOR ANY COST OF COVER OR COST OF PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES), EVEN IF {{ config('app.name', 'Laravel') }} HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES, AND REGARDLESS OF THE LEGAL THEORY UNDER WHICH DAMAGES ARE SOUGHT, WHETHER IN BREACH OF CONTRACT OR IN TORT, INCLUDING NEGLIGENCE OR (B) AMOUNTS IN THE AGGREGATE THAT EXCEED THE FEES PAID BY YOU TO {{ config('app.name', 'Laravel') }} HEREUNDER IN THE SIX (6) MONTHS PRECEDING THE DATE THE CLAIM AROSE.

                Privacy Policy
                You acknowledge that you have read, understand and agree to {{ config('app.name', 'Laravel') }}’s Privacy Policy located at http://{{ config('app.name', 'Laravel') }}.com/privacy, which is hereby incorporated into and made a part of these Terms of Service by this reference.

                Location of the Site and your Use
                {{ config('app.name', 'Laravel') }} operates or controls the operation of this Site and the Service from offices in the United States. In addition, the Site and the Service may be mirrored, and other websites operated or controlled by {{ config('app.name', 'Laravel') }} may be located, at various locations in and outside of the United States. {{ config('app.name', 'Laravel') }} makes no representation or warranty that all of the features of this Site or Service will be available to you outside of the United States, or that they are permitted to be accessed outside of the United States. You acknowledge that you are solely responsible for any decision by you to use of this Site and/or the Service from other locations, and that such use may be subject to, and that you are responsible for, compliance with applicable local laws.

                Notices
                {{ config('app.name', 'Laravel') }} may give notice applicable to {{ config('app.name', 'Laravel') }}’s general Service customer base by means of a general notice on the Service portal, and notices specific to you by electronic mail to your e-mail address on record in your User Account or by written communication sent by first class mail or pre-paid post to your address on record in your User Account. If you have a dispute with {{ config('app.name', 'Laravel') }}, wish to provide a notice under these Terms of Service, or become subject to insolvency or other similar legal proceedings, you must promptly send written notice to {{ config('app.name', 'Laravel') }} at {{ config('app.name', 'Laravel') }}, Inc., 548 Market St. #62411, San Francisco, CA 94104-5401; Attn: Legal.

                General
                These Terms of Service constitute the entire agreement and understanding between the parties concerning the subject matter hereof, notwithstanding any different or additional terms that may be contained in the form of purchase order or other document used by you to place orders or otherwise effect transactions hereunder, which such terms are hereby rejected. Neither party may assign these Terms of Service without the prior written approval of the other, such approval not to be unreasonably withheld or delayed, provided that such approval shall not be required in connection with an assignment to an affiliate or to a successor to substantially all of such party’s assets or business related to these Terms of Service. These Terms of Service supersede all prior or contemporaneous discussions, proposals and agreements between you and {{ config('app.name', 'Laravel') }} relating to the subject matter hereof. No amendment, modification or waiver of any provision of these Terms of Service will be effective unless in writing and signed by an authorized representative of both parties. If any provision of these Terms of Service is held to be invalid or unenforceable, the remaining portions will remain in full force and effect and such provision will be enforced to the maximum extent possible so as to effect the intent of the parties and will be reformed to the extent necessary to make such provision valid and enforceable. No waiver of rights by either party may be implied from any actions or failures to enforce rights under these Terms of Service. These Terms of Service are intended to be and are solely for the benefit of {{ config('app.name', 'Laravel') }} and you and do not create any right in favor of any third party. These Terms of Service will be governed by and construed in accordance with the laws of the State of Delaware, without reference to its conflict of laws principles. The Uniform Computer Information Transactions Act will not apply to this Agreement. All disputes arising out of or relating to these Terms of Service will be submitted to the exclusive jurisdiction of a court of competent jurisdiction located in San Francisco, California, and each party irrevocably consents to such personal jurisdiction and waives all objections to this venue."
            </p>

        </div>
    </div>
</div>
</body>
</html>
