@if(empty($peserta->status))
    <div class="flex flex-col-reverse sm:flex-row justify-between items-center p-6">
        <div class="sm:w-2/5 flex flex-col items-center sm:items-start text-center sm:text-left">
            <h1 class="uppercase text-6xl text-green-600 font-bold leading-none tracking-wide mb-2">Beasiswa</h1>
            <h2 class="uppercase text-4xl text-yellow-400 text-secondary tracking-widest mb-6">Pancakarsa</h2>
            <p class="text-gray-600 leading-relaxed mb-12">Program beasiswa pendidikan pada jenjang S1 untuk Perguruan Tinggi Negeri/Swasta yang telah menjalin kerjasama dengan Pemerintah Daerah Kabupaten Bogor.</p>
                <a href="{{ route('prestasi.create') }}"
                    class="bg-green-600 hover:bg-green-800 py-3 px-6 uppercase text-lg font-bold text-white rounded-full">Daftar Sekarang
                </a>
        </div>
        <div class="mb-16 sm:mb-0 sm:mt-0 sm:w-3/5 sm:pl-12">
            <svg class="w-full h-auto hidden md:block" height="490" viewBox="0 0 64 64" width="628.5" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m13 36h38v26h-38z" fill="#F59E0B"></path><path d="m15 36h36v24h-36z" fill="#FBBF24"></path><path d="m32 62-15-3v-27l10.169 2.712a6.507 6.507 0 0 1 4.831 6.288 6.507 6.507 0 0 1 4.831-6.288l10.169-2.712v27z" fill="#b4b5b9"></path><path d="m47 32v27l-15 3v-21a6.507 6.507 0 0 1 4.83-6.29z" fill="#dcdddf"></path><path d="m31 53h2v9h-2z" fill="#F59E0B"></path><path d="m38 22v23l-6 11-6-11v-23" fill="#fcc533"></path><path d="m30 24h4v21h-4z" fill="#5a5b5d"></path><path d="m43 11v13l-1.257.419a30.811 30.811 0 0 1 -9.743 1.581 30.811 30.811 0 0 1 -9.743-1.581l-1.257-.419v-13" fill="#047857"></path><path d="m53 9-21 7-21-7 21-7z" fill="#059669"></path><path d="m15.5 7.5 19.5 6.5 16.5-5.5-19.5-6.5z" fill="#059669"></path><path d="m21 14.333v9.667l1.257.419a30.811 30.811 0 0 0 9.743 1.581 30.811 30.811 0 0 0 9.743-1.581l1.257-.419v-9.667l-11 3.667z" fill="#059669"></path><path d="m32 56 6-11h-12z" fill="#fee2d6"></path><path d="m32 56 1.636-3h-3.272z" fill="#5a5b5d"></path></svg>
        </div>
    </div>
@elseif($peserta->status == "evaluasi")
    <div class="flex flex-col-reverse sm:flex-row justify-between items-center p-6">
        <div class="sm:w-2/5 flex flex-col items-center sm:items-start text-center sm:text-left">
            <h1 class="uppercase text-5xl text-green-600 font-bold leading-none tracking-wide mb-2">Pendaftaran</h1>
            <h2 class="uppercase text-4xl text-yellow-400 text-secondary tracking-widest mb-10">Berhasil</h2>
            <p class="text-gray-600 leading-relaxed mb-12">Pendaftaran kamu sedang kami evaluasi</p>
                <a href="{{ route('peserta.show', $peserta->id) }}"
                    class="bg-green-600 hover:bg-green-800 py-3 px-6 uppercase text-lg font-bold text-white rounded-full">Lihat Berkas
                </a>
        </div>
        <div class="mb-16 sm:mb-0 sm:mt-0 sm:w-3/5 sm:pl-12">
            <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 1400 1000" style="enable-background:new 0 0 1400 1000;" xml:space="preserve"><style type="text/css">.st1{fill:#F4663B;}.st2{fill:#D64321;}.st3{fill:#00BDD1;}.st4{fill:#059669;}.st5{fill:#FCBE24;}.st6{fill:#FFFFFF;}.st7{fill:#047857;}.st8{opacity:0.65;fill:#D64321;}.st9{fill:#BFBBBB;}.st10{fill:#E2E0E0;}.st11{fill:#EFEDED;}.st12{fill:#40D8F2;}.st13{opacity:0.5;}.st14{fill:none;}.st15{fill:#993300;}.st16{fill:#605D5D;}.st17{fill:#065F46;}.st18{fill:none;stroke:#126184;stroke-miterlimit:10;}.st19{fill:#E58765;}.st20{opacity:0.7;fill:#00BDD1;}.st21{opacity:0.42;fill:#F98A26;}</style><g id="OBJECTS"><g><g><g><g><path class="st1" d="M1157.8,698.4H882c-6.3,0-11.4-5.1-11.4-11.4v-35.1c0-6.3,5.1-11.4,11.4-11.4h275.8c6.3,0,11.4,5.1,11.4,11.4V687C1169.2,693.3,1164.1,698.4,1157.8,698.4z"/><g><rect x="896.1" y="656.2" class="st2" width="15.1" height="26.4"/><rect x="928.6" y="656.2" class="st2" width="15.1" height="26.4"/></g><g><rect x="1090" y="656.2" class="st2" width="15.1" height="26.4"/><rect x="1122.6" y="656.2" class="st2" width="15.1" height="26.4"/></g></g><g><path class="st3" d="M1166.7,640.6H862.8c-6.9,0-12.6-5.6-12.6-12.6v-38.7c0-6.9,5.6-12.6,12.6-12.6h303.9c6.9,0,12.6,5.6,12.6,12.6v38.7C1179.2,635,1173.6,640.6,1166.7,640.6z"/><rect x="906.5" y="599.4" class="st4" width="213.4" height="18.7"/></g><g><g><path class="st5" d="M1145.2,576.8H881.5c-6,0-10.9-4.9-10.9-10.9v-33.6c0-6,4.9-10.9,10.9-10.9h263.7c6,0,10.9,4.9,10.9,10.9v33.6C1156.1,571.9,1151.2,576.8,1145.2,576.8z"/></g><g><rect x="894.1" y="521.4" class="st1" width="14.4" height="55.4"/></g><g><rect x="1113.4" y="521.4" class="st1" width="14.4" height="55.4"/></g><ellipse transform="matrix(0.6526 -0.7577 0.7577 0.6526 -47.7742 991.2259)" class="st1" cx="1057.2" cy="547.7" rx="10.5" ry="10.5"/><ellipse transform="matrix(0.2308 -0.973 0.973 0.2308 219.7997 1373.4736)" class="st1" cx="978.6" cy="547.7" rx="10.5" ry="10.5"/><ellipse transform="matrix(0.2308 -0.973 0.973 0.2308 250.3026 1412.0592)" class="st1" cx="1018.3" cy="547.7" rx="10.5" ry="10.5"/></g></g><g><path class="st4" d="M922.4,677.9H428.8c-10,0-18-8.1-18-18V380.7c0-10,8.1-18,18-18h493.6c10,0,18,8.1,18,18v279.1C940.4,669.8,932.3,677.9,922.4,677.9z"/><rect x="557.8" y="279.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 1188.2281 -162.9371)" class="st6" width="235.7" height="465.4"/><path class="st7" d="M932.1,648H766.9c-6.6,0-12,5.4-12,12l0,0c0,7.4-6,13.4-13.4,13.4H609.7c-7.4,0-13.4-6-13.4-13.4v0c0-6.6-5.4-12-12-12H419c-13.9,0-25.6,10.9-26,24.7c-0.4,14.4,11.1,26.2,25.4,26.2h514.2c14.3,0,25.8-11.8,25.4-26.2C957.7,658.9,946,648,932.1,648z"/></g><g><g><ellipse transform="matrix(0.9965 -8.338711e-02 8.338711e-02 0.9965 -46.1729 58.5792)" class="st2" cx="678.2" cy="582" rx="27.2" ry="27.2"/><rect x="475.6" y="313.7" class="st1" width="405.1" height="268.4"/><polygon class="st8" points="677.7,313.7 677.7,582 884.2,583.8 884.2,315.4"/><g><path class="st9" d="M858.1,533.2l-19.6,31.1l-160.3,3C678.2,567.3,746.4,482.5,858.1,533.2z"/><path class="st9" d="M498.3,533.2l19.6,31.1l160.3,3C678.2,567.3,610,482.5,498.3,533.2z"/><path class="st10" d="M678.2,311.8v255.4c0,0,101.5-46.3,179.9-34.1V277.8C779.7,265.5,678.2,311.8,678.2,311.8z"/><path class="st11" d="M678.2,311.8v255.4c0,0-101.5-46.3-179.9-34.1V277.8C576.7,265.5,678.2,311.8,678.2,311.8z"/></g></g><g><g><circle class="st12" cx="678.2" cy="375.8" r="148.8"/><path class="st3" d="M827,375.8c0,82.2-66.6,148.8-148.8,148.8V227C760.4,227,827,293.6,827,375.8z"/><g class="st13"><path class="st4" d="M534,356.7l-2.7,11.4l3.3,7.9l6.2,5.7l6.2,9.2v6.2l14.1,4.3l10,7.6l7.6,4.1l-2.7,9.8v6.2l5.4,6.8l9.2,8.1l-0.8,14.9l-1.1,16l1.4,14.4l6.5,9.8l6.2-2.4l-3.3-1.9l-1.6-5.2l2.7-3.8l-3.5-2.4l3.3-6.5l1.4-5.4h5.2l1.6-4.6l5.2-5.7l1.9-6.8l2.7-4.9h5.4l2.2-12.2l4.9-10l-10.9-3.8l-7.3-4.1l-3.5-4.3h-4.9l-6.8-5.2l-10-4.1l-5.7,4.1l-7.3-2.7l1.1-4.6l-6.2-1.9l1.6-5.7l-6.6,3.3l-3.9-1.1l-1.6-4.3l3.5-7.1l5.4-1.9l9.2-1.1l6.8-6.2l6.2-7.6l5.2-5.7l9.2-1.6l-2.7-3l2.2-5.2h9l-2.2-7.3l-4.1-8.4l-4.9,1.1l-1.9-5.2l-7.1-4.3l-2.7,14.4h-5.7l-6.5-3.5l-3-8.7l9-6.8l7.9-4.6l5.7-6.2l4.9,5.7l-5.4,5.4l6.8,6.5l4.3-3l2.7-5.7l-2.7-7.9l-3.8-10.6l-10.9-1.5l-1.6,8.3l-3.5,3.8l-1.6-8.4l-9.2,6.8h-11.7l-1.6-3l-9.2-7.6h-6c-7.3,12.8-12.7,26.8-15.9,41.6l3.7,5L534,356.7z"/><polygon class="st4" points="655.8,320.5 659.5,317.4 664,304.6 667.4,294.5 670.1,290.8 668.6,287.7 664.8,288.7 661.1,286.3 664.8,283.9 659.3,277.3 653.2,280.2 646.9,284.3 641.6,282.2 632.6,284.1 627.3,293 622.2,293 625.3,298.1 620.6,297.3 620.6,300.7 626.5,302 629.6,305.8 630.8,315.8 630.4,321.9 628.1,329.2 630.4,338.2 636.1,342.3 640.4,331.3 644.4,331.3 647.5,328.6 655.2,325.6"/><path class="st4" d="M827.8,346.9l-3-8.4l-2.8-1c1.4,5.5,2.6,11,3.4,16.7L827.8,346.9z"/><path class="st4" d="M795.3,290.7v5.2l-7.6,0.5l-3.5-3.8l-3.5-1.9l-3.5,6l-10.3,0.5v-4.3l-4.6-5.7h-9l-1.4,4.9l-7.1,6.8v3h-3l-1.4,4.2l-3.5,2.3l-3.5-2.3l-2.7,4.8l4.3,7.9l-7.9-3.5l-1.4,4.1h-5.7l-6.2,4.6l-6,6.2l-2.2-1.9l2.4-4.3l-4.1-6h-12.2l-7.6,7.9l-7.9,11.7v4.6l5.4,0.8l7.9-0.3l-1.9-7.1l3.8-6l3.3-1.4l-2.7,10.3l3.5,4.6l-1.9,6.8l-7.6-2.2l-9.2,1.1l-2.7,7.3l-5.4,3.3v6l-8.4,0.8v5.4l8.4,1.1l3.8-4.3l2.2-4.3h9l5.3,3.5l3.9,6.2l3,3.4l1.9-5.3l2.2-1.6l3.3,6.5l8.7,0.5l-2.2,6.8l-14.1-4.3l-1.4,4.3l-9.5-2.7l-2.2-6l-12.8,3h-3.8l-4.1,7.3l-8.4,9.2l-2.2,10l5.2,6.8l8.7,3.3l11.7-1.9l5.4,5.2l0.3,5.2l3.5,3.8l1.4,6.8l-2.4,7.1l6.8,23.1h11.4l5.4-7.1l3.3-11.4l5.2-2.4l1.4-10l0.3-9.2l10.3-6.2l3-9.8l-7.1,2.4l-6.8-4.1l-6.2-11.4l-1.9-5.4l5.4-0.3l4.6,9l3.5,6h7.6l8.4-6.2l-2.4-4.9l-5.7-3l-1.6-4.3l9.8,4.3l5.7-0.3l10.3,6.8l3.3,8.1l6.8,5.7l3.8-10.3l5.4-5.2h4.9l6,7.1l4.9,4.1l6.2,4.3l3.8-8.4l-4.6-5.4l9.2-3l7.6-7.9l0.8-9l-6.5-6l-0.3-3.8l4.3,1.1l6,7.6l4.1-4.1l-5.4-4.6l3.3-3.8l5.2-5.4l1.2-3.5c-0.8-5.7-2-11.3-3.4-16.7l-5.3-1.9l1.9-7.5l0.5-0.4c-4.5-13.3-10.9-25.7-18.8-37H795.3z"/><polygon class="st4" points="730,447.2 730,455.9 733.1,457.2 736.3,450.2 736.3,440.7 731.6,443.1"/><polygon class="st4" points="626.9,271 627.9,268.6 619.4,266.9 610,268.6 602.3,270.2 599.6,277.5 596,280.2 593.3,280.2 591.1,285.7 592.1,293.2 601.7,293.2 606.6,293.2 608.2,285.7 614.7,280.1 619.6,277.9 621,272.6"/></g><line class="st14" x1="678.2" y1="524.7" x2="678.2" y2="227"/></g><g><path class="st1" d="M822.4,275.1c0,14.5-26,45.1-26,45.1s-26-30.5-26-45.1c0-14.5,11.7-26.3,26-26.3C810.7,248.8,822.4,260.6,822.4,275.1z"/><ellipse class="st15" cx="796.4" cy="274.8" rx="13.7" ry="13.8"/></g><g><path class="st5" d="M730.9,329.9c0,13-23.4,40.4-23.4,40.4s-23.4-27.4-23.4-40.4c0-13,10.5-23.6,23.4-23.6C720.4,306.3,730.9,316.8,730.9,329.9z"/><ellipse class="st8" cx="707.5" cy="329.6" rx="12.3" ry="12.4"/></g><g><path class="st1" d="M616.5,387.5c0,12.3-22.1,38.2-22.1,38.2s-22.1-25.9-22.1-38.2c0-12.3,9.9-22.3,22.1-22.3C606.6,365.2,616.5,375.2,616.5,387.5z"/><ellipse class="st15" cx="594.4" cy="387.2" rx="11.6" ry="11.7"/></g><g><path class="st5" d="M581.9,283.8c0,12.9-23.1,40.1-23.1,40.1s-23.1-27.2-23.1-40.1s10.4-23.4,23.1-23.4C571.6,260.5,581.9,270.9,581.9,283.8z"/><ellipse class="st8" cx="558.8" cy="283.6" rx="12.2" ry="12.3"/></g></g></g><g><polygon class="st10" points="993.1,553.3 900.2,553.3 906.4,529.1 986.9,529.1"/><polygon class="st10" points="980.2,698.5 913.2,698.5 901.5,553.3 991.9,553.3"/><polygon class="st9" points="979,553.3 967.3,698.5 980.2,698.5 991.9,553.3"/><polygon class="st2" points="988.4,597.3 984.5,645.5 971.5,645.5 975.4,597.3"/><polygon class="st1" points="905,597.3 908.9,645.5 984.5,645.5 988.4,597.3"/><polygon class="st2" points="988.4,597.3 984.5,645.5 971.5,645.5 975.4,597.3"/><rect x="891.6" y="546.3" class="st1" width="110.2" height="13.8"/><g><path class="st7" d="M935.4,613c-4,4.2-2.9,11.9,2.5,17.3c5.4,5.5,13.2,6.5,17.3,2.3c0.4-0.4,0.8-0.9,1.1-1.4c-6.1-5.6-8.7-3.8-15.4-10.4C937.6,617.6,936.4,615.3,935.4,613z"/><path class="st7" d="M955.5,612.5c-5.4-5.4-13.2-6.5-17.3-2.3c0,0-0.1,0.1-0.1,0.1c1.1,2.2,2.3,4.5,5.5,7.8c6.6,6.6,9.2,4.8,15.4,10.4C961.8,624.1,960.4,617.4,955.5,612.5z"/></g></g><g><path class="st10" d="M1044.6,391.6v-64.7h1.3c5.1,0,9.2-4.1,9.2-9.2s-4.1-9.2-9.2-9.2h-42.8c-5.1,0-9.2,4.1-9.2,9.2s4.1,9.2,9.2,9.2h1.3v64.7c-27.3,8.5-47.1,34-47.1,64.1c0,37.1,30.1,67.2,67.2,67.2c37.1,0,67.2-30.1,67.2-67.2C1091.7,425.6,1071.9,400.1,1044.6,391.6z"/><path class="st1" d="M1050.8,457.2c-13.2,0-13.2-11.9-26.3-11.9c-13.2,0-13.2,11.9-26.3,11.9c-13.1,0-13.1-11.9-26.3-11.9c-7.4,0-10.7,3.8-14.4,7.1c-0.1,1.1-0.1,2.2-0.1,3.3c0,37.1,30.1,67.2,67.2,67.2c37.1,0,67.2-30.1,67.2-67.2c0-1.1,0-2.2-0.1-3.3c-3.8-3.3-7-7.2-14.5-7.2C1063.9,445.2,1063.9,457.2,1050.8,457.2z"/></g><g><path class="st11" d="M1090,464.2l15.2,49.3v186.2H1261V483.3c0-10.5-8.5-19.1-19.1-19.1H1090z"/><path class="st10" d="M1105.2,521.3h-30.4v-41.9c0-8.4,6.8-15.2,15.2-15.2l0,0c8.4,0,15.2,6.8,15.2,15.2V521.3z"/><g><rect x="1129.5" y="490.4" class="st16" width="115.4" height="4.7"/><rect x="1129.5" y="524.3" class="st16" width="115.4" height="4.7"/><rect x="1129.5" y="558.2" class="st16" width="115.4" height="4.7"/><rect x="1129.5" y="592" class="st16" width="115.4" height="4.7"/><rect x="1129.5" y="625.9" class="st16" width="115.4" height="4.7"/></g><g><polygon class="st3" points="1245.4,520.4 1245.4,475.2 1219.1,475.2 1219.1,520.4 1232.3,513.5"/><path class="st5" d="M1262.1,472.7c0,3.7-5,6.5-6.4,9.7c-1.4,3.4,0.2,8.8-2.3,11.4c-2.5,2.5-8,0.9-11.4,2.3c-3.3,1.3-6,6.4-9.7,6.4s-6.5-5-9.7-6.4c-3.4-1.4-8.8,0.2-11.4-2.3c-2.5-2.5-0.9-8-2.3-11.4c-1.3-3.3-6.4-6-6.4-9.7c0-3.7,5-6.5,6.4-9.7c1.4-3.4-0.2-8.8,2.3-11.4c2.5-2.5,8-0.9,11.4-2.3c3.3-1.3,6-6.4,9.7-6.4c3.7,0,6.5,5,9.7,6.4c3.4,1.4,8.8-0.2,11.4,2.3c2.5,2.5,0.9,8,2.3,11.4C1257,466.3,1262.1,469,1262.1,472.7z"/></g></g><g><polygon class="st7" points="751.2,260.5 679.6,296.3 607.9,260.5 607.9,160.8 751.2,160.8"/><polygon class="st4" points="815.3,176.6 679.6,231.9 543.8,176.6 679.6,121.2"/><polygon class="st17" points="751.2,202.7 751.2,217.3 679.6,246.5 607.9,217.3 607.9,202.7 679.6,231.9"/><polyline class="st18" points="679.6,176.6 543.8,176.6 543.8,224"/><g><line class="st18" x1="543.8" y1="228.1" x2="543.8" y2="246.5"/><line class="st18" x1="543.5" y1="228" x2="538.7" y2="245.8"/><line class="st18" x1="544.2" y1="228" x2="549" y2="245.8"/></g><circle class="st19" cx="543.8" cy="226.6" r="5.8"/></g><path class="st2" d="M1091.6,452.4c-3.8-3.3-7-7.2-14.5-7.2c-13.2,0-13.2,11.9-26.3,11.9c-3.3,0-5.8-0.8-7.9-1.9c3.1,6.6,4.8,14.1,4.8,21.9c0,19.7-11,36.8-27.1,45.6c1.3,0.1,2.6,0.1,3.8,0.1c37.1,0,67.2-30.1,67.2-67.2C1091.7,454.6,1091.6,453.5,1091.6,452.4z"/><g><path class="st12" d="M383.5,677.7v1.1c0,11.2-9.1,20.3-20.3,20.3h-1.1C373.9,699.1,383.5,689.5,383.5,677.7z"/><g><path class="st1" d="M366,461.1h-43.1V349.6c0-6.4,5.2-11.7,11.7-11.7h19.8c6.4,0,11.7,5.2,11.7,11.7V461.1z"/><path class="st1" d="M217.5,461.1h-43.1V349.6c0-6.4,5.2-11.7,11.7-11.7h19.8c6.4,0,11.7,5.2,11.7,11.7V461.1z"/></g><g><path class="st1" d="M368,673.6L368,673.6V565.3h51.3v57.1C419.2,650.7,396.3,673.6,368,673.6z"/><path class="st1" d="M172.4,673.6L172.4,673.6V565.3h-51.3v57.1C121.2,650.7,144.1,673.6,172.4,673.6z"/></g><path class="st12" d="M363.2,699.1h-186c-11.2,0-20.3-9.1-20.3-20.3V499.5c0-59.4,48.2-107.6,107.6-107.6h11.3c59.4,0,107.6,48.2,107.6,107.6v179.3C383.5,690,374.4,699.1,363.2,699.1z"/><path class="st12" d="M362.1,699.1H178.3c-11.8,0-21.3-9.6-21.3-21.3V472c0-62.6,50.7-113.3,113.3-113.3h0c62.6,0,113.3,50.7,113.3,113.3v205.8C383.5,689.5,373.9,699.1,362.1,699.1z"/><path class="st20" d="M383.5,472v27.6c0-44.6-27.1-82.8-65.7-99.1c-2.4-3-5-5.8-7.7-8.5c-16-16-36.8-27.2-60-31.4c6.5-1.2,13.2-1.8,20.1-1.8c31.3,0,59.6,12.7,80.1,33.2C370.8,412.4,383.5,440.7,383.5,472z"/><path class="st12" d="M363.2,699.1h-186c-11.2,0-20.3-9.1-20.3-20.3V499.5c0-59.4,48.2-107.6,107.6-107.6h11.3c59.4,0,107.6,48.2,107.6,107.6v179.3C383.5,690,374.4,699.1,363.2,699.1z"/><path class="st12" d="M383.5,499.5v179.3c0,11.2-9.1,20.3-20.3,20.3h-41.3c11.8,0,21.3-9.6,21.3-21.3V472c0-27.1-9.6-52.1-25.5-71.6C356.4,416.7,383.5,455,383.5,499.5z"/><path class="st3" d="M343.3,677.7v1.1c0,11.2-9.1,20.3-20.3,20.3h-1.1C333.7,699.1,343.3,689.5,343.3,677.7z"/><g><path class="st1" d="M362.6,699.1H177.8c-11.5,0-20.8-9.3-20.8-20.8v-193c0-61.1,49.5-110.6,110.6-110.6h5.3c61.1,0,110.6,49.5,110.6,110.6v193C383.5,689.7,374.2,699.1,362.6,699.1z"/><g><path class="st12" d="M383.5,499.5v179.3c0,11.2-9.1,20.3-20.3,20.3h-186c-11.2,0-20.3-9.1-20.3-20.3V499.5c0-59.4,48.2-107.6,107.6-107.6h11.3c14.9,0,29,3,41.9,8.5C356.4,416.7,383.5,455,383.5,499.5z"/><path class="st20" d="M383.5,499.5v178.2c0,11.8-9.6,21.3-21.3,21.3h-40.2c11.8,0,21.3-9.6,21.3-21.3V472c0-27.1-9.6-52.1-25.5-71.6C356.4,416.7,383.5,455,383.5,499.5z"/><rect x="197.9" y="451.2" class="st1" width="144.6" height="39.7"/><g><path class="st1" d="M334,644.3H206.4c-6.2,0-11.2-5-11.2-11.2v-52.4c0-20.3,16.4-36.7,36.7-36.7h76.5c20.3,0,36.7,16.4,36.7,36.7v52.4C345.2,639.3,340.2,644.3,334,644.3z"/></g></g></g></g><g><g><path class="st5" d="M413.5,538.6h-14.4v-97.7h106.2v5.9C505.3,497.4,464.1,538.6,413.5,538.6z M411,526.7h2.6c42,0,76.6-32.7,79.7-73.9H411V526.7z"/><path class="st5" d="M370.5,538.6h-14.4c-50.6,0-91.7-41.1-91.7-91.7v-5.9h106.2V538.6z M276.4,452.8c3,41.3,37.6,73.9,79.7,73.9h2.6v-73.9H276.4z"/></g><path class="st5" d="M314.2,412.7V513c0,33.8,24.3,62,56.5,67.9v49.3H399v-49.3c32.1-6,56.5-34.1,56.5-67.9V412.7H314.2z"/><path class="st21" d="M429.3,412.7V513c0,49.3-46.1,38.6-46.1,80.5v36.8H399v-49.3c32.1-6,56.5-34.1,56.5-67.9V412.7H429.3z"/><rect x="337.5" y="610.2" class="st5" width="94.6" height="49.1"/><rect x="337.5" y="622.2" class="st21" width="94.6" height="37.1"/><rect x="304" y="632.9" class="st5" width="161.6" height="66.2"/><rect x="333.3" y="654.5" class="st6" width="103" height="19.2"/></g></g><path class="st4" d="M1285.7,698.4H97.6c-5.8,0-10.6,4.7-10.6,10.6l0,0c0,5.8,4.7,10.6,10.6,10.6h1188.1c5.8,0,10.6-4.7,10.6-10.6l0,0C1296.2,703.1,1291.5,698.4,1285.7,698.4z"/></g></g></svg>
        </div>
    </div>
@endif
