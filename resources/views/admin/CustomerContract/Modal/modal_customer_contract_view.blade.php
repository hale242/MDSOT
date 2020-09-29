<style media="screen">
    .text-color-red {
        color:red;
    }
</style>
<div class="modal fade" id="ModalViewContract" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 row">
                    <div class="col-md-6">
                        <img src="{{asset('uploads/images/logo.png')}}" width="60%">
                    </div>
                    <div class="col-md-6 text-right mt-3"><h1>ต้นฉบับ</h1></div>
                    <div class="col-md-12 text-center mt-4"><h3>สัญญาจ้างบริการพนักงานขับรถยนต์</h3></div>
                    <div class="col-md-12 text-right"><p>เลขที่สัญญา <span class="text-color-red" id="show_customer_contract_full_code"></span></p></div>
                    <div class="col-md-12">
                        <p>
                            สัญญาฉบับนี้ทำขึ้นเมื่อวันที่ <span class="text-color-red show_customer_contract_date_start"></span> บริษัท มาสเตอร์ไดรฟเวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด สัญญาฉบับนี้ทำขึ้นระหว่าง <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ก) บริษัท มาสเตอร์ไดรฟเวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด <br />
                            สำนักงานตั้งอยู่ที่ 22229 ถนนลาดพร้ว แขวงหลับพลา เขตวังทองหลาง กรุงเทพมหานคร 10310 <br />
                            ซึ่งต่อไปในสัญญานี้จะเรียว่า "ผู้รับจ้าง" ฝ่ายหนึ่งกับ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ข) <span class="text-color-red" id="show_company_name"></span> <br />
                            สำนักงานตั้งอยู่ที่ <span class="text-color-red" id="show_customer_contract_address"></span><br />
                            ซึ่งต่อไปในสัญญานี้จะเรียกว่า "ผู้ว่าจ้าง" อีกฝ่ายหนึ่ง <br />
                            ทั้งสองฝ่ายได้ตกลงทำสัญญาต่อกัน มีข้อความสำคัญดังต่อไปนี้ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 1. การบริการและระยะเวลาของสัญญา </u> <br />
                            ผู้ว่าจ้างตกลงจ้าง และผู้รับจ้างตกลงรับจ้าง ให้บริการพนักงานขับรถยนต์จำนวน <span class="text-color-red" id="show_sum_unit"></span> อัตรา ให้แก่ผู้ว่าจ้างดังรายละเอียด ตามที่ปรากฏในเอกสารแนบท้ายสัญญา ซึ่งต่อไปในสัญญานี้จะเรียกว่า "พนังานขับรถยนต์" สัญญาฉบับนี้
                            มีกำหนดระยะเวลา <span class="text-color-red" id="show_customer_contract_month"></span> โดยให้เริ่มมีผลบังคับใช้ตั้งแต่วันที่ <span class="text-color-red show_customer_contract_date_start"></span> จนถึงวันที่ <span class="text-color-red" id="show_customer_contract_date_end"></span> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 2. วัน/เวลา การให้บริการ </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.1 ผู้รับจ้างจะจัดส่งพนักงานขับรถยนต์ไปปฏิบัติหน้ที่ให้แก่ผู้ว่าจ้าง ในวันเปิดทำการของผู้ว่าจ้างระหว่าง วันจันทร์ ถึง วันศุกร์ ตั้งแต่เวลา <span class="text-color-red" id="show_customer_contract_time_start"></span>
                            ถึง <span class="text-color-red" id="show_customer_contract_time_end"></span> โดยจะหยุดให้บริการในวันเสาร์-อาทิตย์ ของทุกสัปดาห์ และวันหยุดตามประเพณีของทางราชการ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.2 หากผู้ว่าจ้างมีความประสงค์ที่จะรับบริการนอกเหนือจากวันและหรือ เวลาที่ระบุไว้ในช้อ 2.1
                            แล้วผู้ว่าจ้างจะดำเนินการแจ้งให้ผู้รับจ้างทราบล่วงหน้าและยินยอมชำระค่าบริการที่เพิ่มขึ้น โดยให้เป็นไปตามงื่อนไขที่ปรากฏในเอกสารแนบท้ายสัญญานี้ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 3. ค่าบริการ </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อ 3.1 ผู้ว่าจ้างตกลงชำระค่าบริการให้แก่ผู้รับจ้าง โดยจะชำระเป็นรายเดือน ในอัตราค่าบริการเดือนละ <span class="text-color-red" id="show_customer_contract_price"></span> บาท <span class="text-color-red" id="show_customer_contract_price_text"></span>
                            ยังไม่รวมภาษีมูลค่าเพิ่ม ทั้งนี้ผู้ว่าจ้างจะชำระค่าบริการงวดแรกตั้งแต่วันที่เริ่มสัญญานี้เป็นตันไป ส่วนค่าบริการในงวดถัดไปและค่าบริการซึ่งเพิ่มขึ้นอันเนื่องจากการรับบริการนอกเหนือจากวันและหรือเวลา
                            การให้บริการตามปกติที่ระบุไว้ในข้อ 2.2 หรือในกรณีอื่นใด ของเดือนก่อนหน้านั้น ผู้ว่าจ้างจะชำระเป็นรายเดือนแห่งปฏิทิน ภายในวันที่ <span class="text-color-red" id="show_customer_contract_date_pay"></span> ของเดือน
                            โดยผู้รับจ้างจะคำนวณค่าบริการซึ่งเพิ่มขึ้นตามอัตราที่กำหนดไว้ในเอกสารแนบท้ายสัญญานี้ และผู้ว่าจ้างจะชำระโดยไม่มีข้อโต้แย้งใดๆ ทั้งสิ้น <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อ 3.2 ผู้ว่าจ้างตกลงและยินยอมให้ผู้รับจ้าง ปรับอัตราค่าบริการเพิ่มขึ้นตามข้อ 3.1
                            ได้หากมีการประกาศขึ้นค่าแรงขั้นต่ำจากรัฐบาลโดยอัตราค่าบริการที่ปรับเพิ่มขึ้น ให้ปรับเพิ่มขึ้นตามส่วนต่าง ของค่าแรงขั้นต่ำที่เพิ่มขึ้นเดิมที่ใช้อยู่ก่อนมีการประกาศ
                            ขึ้นค่าแรงขั้นต่ำโดยอ้างอิงจากค่าแรงขั้นต่ำในเขตกรุงเทพมหานคร รวมถึงตกลงและยินยอมให้ปรับอัตราค่าบริการที่เพิ่มขึ้นตาม ช้อ 2.2 ตามสัดส่วนของค่าบริการที่เพิ่มขึ้นตามการปรับค่าแรงขั้นต่ำ
                            ทั้งนี้หากจะมีการปรับอัตราค่าบริการในข้อนี้แล้ว ผู้รับจ้างจะดำเนินการแจ้งให้ผู้ว่าจ้างทราบเป็นลายลักษณ์อักษรก่อนมีการปรับขึ้นอัตราค่าบริการล่วงหนไม่น้อยกว่า 15 วัน <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อ 3.3 การจ่ายเงินตามงื่อนไขแห่งสัญญนี้ ผู้จ้างจะโอนเงินเช้าบัญชีของผู้รับจ้างเลขที่ 200-088922-6 ชื่อบัญชี บริษัท มาสเตอร์ ไดรฟเวอร์ แอนด์
                            เซอร์วิสเซส (ประเทศไทย) จำกัด ธนาคาร กรุงเทพ สาขา สวนพลู หรือโดยการสั่งจ่ายเช็คล่วงหน้าระบุ Account Payee Only ให้กับผู้รับจ้าง หรือชำระด้วยแคชเชียร์เช็คหรือเงินสด ณ ที่ทำการของผู้รับจ้าง
                            หรือโดยวิธีอื่นใดที่ผู้รับจ้างกำหนด <br />
                            โดยกำหนดชำระเงินค่าบริการแต่ละครั้งถือว่าเป็นสาระสำคัญ ในกรณีที่ผู้ว่าจ้างผิดนัดชำระงินค่าบริการไม่ว่าผู้รับจ้างจะ มีหนังสือทวงถามให้ผู้ว่าจ้างทำการชำระค่าบริการให้ครบถ้วนภายในระยะเวลาที่กำหนดหรือไม่
                            ผู้ว่าจ้างตกลงที่จะเสียดอกเบี้ยใน อัตราร้อยละ 12.5 ต่อเดือน ของยอดเงินคำบริการที่คงชำระ นับตั้งแต่วันที่ผิดนัดจนถึงวันที่ผู้วจ้างได้ชำระเงินค่าบริการให้แก่ผู้รับจ้างโดยถูกต้องครบถ้วนแล้ว <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 4. สิทธิ หน้าที่และความรับผิดชอบผู้รับจ้าง </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.1 ผู้รับจ้างมีหน้าที่ดำเนินการจัดส่งพนักงานขับรถยนต์ไปให้บริการแก่ผู้ว่าจ้าง ตามวันเวลาและเงื่อนไขที่กำหนดไว้ในข้อ 2 หรือ วันเวลาอื่น ๆ
                            ตามที่ผู้ว่าจ้างได้ดำเนินการแจ้งความประสงค์ไปให้ผู้รับจ้างทราบล่วงหน้าแล้วพอสมควร เพื่อขอรับบริการนอกเหนือเวลาทำงานปกติ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.2 ผู้รับจ้างมีหน้าที่รับผิดชอบค่าใช้จ่าย ในส่วนของเงินเดือน ค่าเดินทาง ค่าที่พักและสวัสดิการต่าง ๆ ของพนักงานขับรถยนต์ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.3 ผู้รับจ้างจะต้องรับผิดชอบชดใช้ค่าเสียหายอันเกิดจากพนักงานขับรถยนต์ ไม่ว่าจะเจตนาหรือประมาทเลินเล่อก็ตาม ซึ่ง
                            เกิดแก่ทรัพย์สินหรือเอกสารของผู้ว่าจ้างหรือบุคคลภายนอก โดยผู้รับจ้างจะรับผิดชอบตามความเสียหายที่เกิดจริง แต่จะไม่เกิน ครั้งละ 10,000 บาท (หนึ่งหมื่นบาทถ้วน) และผู้ว่าจ้างจะต้องพิสูจน์ให้เห็นว่าความเสียหายดังกล่าว
                            เกิดขึ้นจากการกระทำของพนักงานขับรถยนต์ของผู้รับจ้างจริง <br />
                            แต่อย่างไรก็ตาม ผู้รับจ้างขอสงวนความรับผิดที่จะไม่รับผิดชอบในความเสียหายดังกล่าวข้างต้น ไม่ว่ากรณีใดก็ตามอัน เกิดขึ้นจากความประมาทเลินเล่อของผู้ว่าจ้างหรือพนักงานของผู้ว่าจ้างเอง
                            หรือเป็นกรณีที่ความเสียหายดังกล่าวเกิดขึ้นกับเงินสด เช็คเงินสด เช็คผู้ถือ วัตถุโบราณ วัตถุมงคล อัญมณี และยานพาหนะ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.4 ผู้รับจ้างมีหน้าที่ในการจัดการฝึกอบรมพนักงานขับรถยนต์ ให้มีมาตรฐานตามระดับของพนักงานขับรถยนต์ หากผู้รับ
                            จ้างมีความประสงค์จะให้พนักงานขับรถยนต์เข้าฝึกอบรมแล้ว ผู้รับจ้างจะดำเนินการแจ้งล่วงหน้าเป็นลายลักษณ์อักษรให้ผู้ว่าจ้าง ทราบไม่น้อยกว่า 7 (เจ็ด) วัน
                            และผู้ว่าจ้างจะต้องอนุญาตให้พนักงานขับรถยนต์เข้ารับการฝึกอบรมตามที่ผู้รับจ้างร้องขอ โดยทาง ผู้รับจ้างจะจัดส่งพนักงานขับรถยนต์ทดแทนมาให้เป็นการชั่วคราว โดยผู้รับจ้างยังคงต้องรับผิดต่อผู้ว่าจ้างเสมือนว่าเป็นพนักงาน
                            ขับรถยนต์ตามสัญญานี้ทุกประการ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.5 ผู้รับจ้างมีหนัที่ประเนผลการทำงานของพนักงานขับรถ โดยเก็บรวบวมข้อมูลผลการประเมินพนักงานชับรถยนต์ จากการประเมินของผู้ว่าจ้างตามระยะเวลาที่กำหนด
                            ซึ่งผู้รับจ้างจะต้องแจ้งให้ผู้ว่าจ้างทราบผลการประเมินนั้นด้วย <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.6 หากผู้รับจ้างไม่สามารถดำเนินการจัดส่งพนักงานขับรถยนต์ให้แก่ผู้ว่าจ้างได้ในวันใด ผู้รับจ้างจะต้องแจ้งให้ผู้ว่าจ้าง
                            ทราบและดำเนินการจัดส่งพนักงานขับรถยนต์ทดแทนไปให้บริการแก่ผู้ว่าจ้างเป็นการชั่วคราว หากผู้รับจ้างไม่สามารถดำเนินการ จัดส่งพนักงานขับรถยนต์ทดแทนให้แก่ผู้ว่าจ้างได้แล้ว
                            ผู้รับจ้างจะต้องยินยอมให้ผู้ว่าจ้างงดเว้นการชำระค่าบริการในวันดังกล่าว ได้ โดยให้ทำการหักออกจากค่าบริการรายเดือน ๆ นั้น <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ทั้งนี้จะต้องแจ้งให้ผู้รับจ้างทราบเป็นลายลักษณ์อักษรทุกครั้งที่มีการหักค่าบริการ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 5. สิทธิ หน้าที่และความรับผิดชอบผู้ว่าจ้าง </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.1 ผู้ว่าจ้างมีหน้าที่ต้องชำระค่าบริการ และหรืองินจำนวนใด ๆ ตามที่ระบุไว้ในข้อ 3 ให้ครบถ้วนแก่ผู้รับจ้างตลอดอายุสัญญานี้ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.2 ผู้ว่าจ้างจะต้องไม่อนุญาตหรือยินยอมให้บุคคลภายนอก ถือประโยชน์ในการรับบริการตามสัญญานี้ไม่ว่าด้วยประการ ใด ๆ
                            เว้นแต่ได้รับความยินยอมเป็นลายลักษณ์อักษรจากผู้รับจ้างหรือกำหนดไว้เป็นอย่งอื่นในสัญญหากผู้ว่าจ้างไม่ปฏิบัติตาม แล้วผู้รับจ้างปฏิธที่จะชดใช้ความเสียหายใด ๆ ที่อาจเกิดขึ้นแก่ผู้ว่าจ้างหรือบุคคลภายนอก
                            อันเนื่องมาจากการนั้นทุกกรณี <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.3 ผู้ว่าจ้างจะต้องเป็นผู้จัดทำประกันภัยประเภทชั้นหนึ่ง และประกันภัยตามฎหมายว่าด้วยผู้ประสบภัยจากรถอย่าง
                            ต่อเนื่องตลอดอายุสัญญานี้ให้กับรถยนต์ที่มอบหมายให้พนักงานขับรถยนต์เป็นผู้ขับขี่ หากมิได้มีการจัดทำดังกล่าวหรือกรณี กรมธรรม์ประกันภัยหมดอายุก่อนหรือระหว่างที่สัญญานี้มีผลบังคับใช้
                            ผู้รับจ้างจะไม่รับผิดชอบต่อความเสียหายใด ๆ อันอาจเกิด ขึ้นจากการใช้รถยนต์คันดังกล่ว ไม่ว่าต่อผู้ว่จางหรือบุคคลภายนอก <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.4 ผู้ว่าจ้างต้องไม่อนุญาตให้พนักงานขับรถยนต์นำรถยนต์ไปใช้งานส่วนตัวหรือนำรถยนต์ไปใช้นอกเหนือจากวันเวลา ให้บริการตามข้ว 2
                            หากผู้ว่าจ้างอนุญาตให้พนักงานขับรถยนต์นำรถยนต์ไปใช้นอกเหนือจากวันเวลาให้บริการดังกล่าวผู้ว่าจ้างต้อง รับผิดชอบต่อค่าใช้จ่ายและหรือความเสียหายใด ๆ อันอาจเกิดขึ้นจากการใช้รถยนต์คันดังกล่าวเองทั้งสิ้น <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.5 ภายในระยะเวลา 3 เดือน นับแต่สัญญานี้สิ้นสุดลงและหรือนับแต่วันที่พนักงานขับรถยนต์พ้นสภาพจากการเป็น พนักงานของผู้รับจ้าง
                            ผู้ว่าจ้างต้องไม่รับพนักงานขับรถยนต์ดังกล่าวเป็นพนักงานของผู้ว่าจ้างเอง หากผู้ว่าจ้างไม่ปฏิบัติตามแล้ว ผู้ว่าจ้างต้องชดใช้ให้แก่ผู้รับจ้างเป็นเงินจำนวน 3 (สาม)
                            เท่าของอัตราค่าบริการรายเดือนต่อพนักงานขับรถยนต์หนึ่งอัตรา <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.6 ผู้ว่าจ้างมีสิทธิ์ที่จะขอเปลี่ยนพนักงานขับรถยนต์ได้ โดยจะต้องดำเนินการแจ้งให้ผู้รับจ้างทราบล่วงหน้าเป็นลายลักษณ์ อักษรไม่น้อยกว่า 7 (เจ็ด)
                            วันทำการของผู้รับจ้าง โดยไม่เสียค่าใช้จ่ายแต่อย่างใด แต่จะต้องเป็นกรณีที่พนักงานขับรถยนต์มีความ บกพร่องต่อหน้ที่หรือปฏิบัติตนไม่เหมาะสมเท่านั้นอันได้แก่ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1) ความประพฤติไม่ดีอย่างร้ายแรง โดยผู้รับจ้างจะเป็นผู้พิจารณาความประพฤติดังกล่าวว่ามีความร้ายแรงหรือไม่อย่างไร <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) ไม่ปฏิบัติตามกฎระเบียบหรือข้อบังคับใด ๆ ตามที่ผู้ว่าจ้างกำหนด และผู้ว่าจ้างได้เคยแจ้งมายังผู้รับจ้างเพื่อให้ทำการ แก้ไขเป็นลายลักษณ์อักษรแล้ว
                            2 (สอง) ครั้ง เว้นแต่เป็นกรณีร้ายแรง <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3) ทุจริตต่อหน้าที่ หรือกระทำความผิดทางอาญาโดยเจตนาแก่ผู้ว่าจ้างหรือพนักงานของผู้ว่าจ้าง <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (4) จงใจทำให้ผู้ว่าจ้างได้รับความเสียหาย <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 6. การบอกเลิกสัญญา </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.1 ในกรณีที่เกิดเหตุการณ์อย่างใดอย่างหนึ่งดังจะกล่าวต่อไปนี้ ให้ถือว่าสัญญาจ้างพนักงานขับรถยนต์เป็นอันเลิกกัน <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1) เมื่อครบกำหนดระยะเวลาการบริการตามข้อ 1 <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) เมื่อผู้ว่าจ้างใช้สิทธิ์บอกเลิกสัญญานี้ตามข้อ 6.2 <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3) เมื่อผู้รับจ้างใช้สิทธิ์บอกเลิกสัญญานี้ตามข้อ 6.3 และหรือ 6.4 <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.2 หากผู้ว่าจ้างประสงค์จะบอกเลิกสัญญาก่อนครบกำหนดระยะเวลาตามข้อ 1 ผู้ว่าจ้างจะต้องทำการบอกกล่าวล่วงหน้า เป็นลายลักษณ์อักษรให้ผู้รับจ้างทราบ
                            เป็นระยะเวลาไม่น้อยกว่า 30 (สามสิบ) วัน <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.3 ผู้รับจ้างอาจใช้สิทธิ์บอกเลิกสัญญานี้ได้ทันที่โดยมิต้องบอกกล่าวล่วงหน้าเมื่อผู้ว่าจ้างผิดนัดไม่ชำระค่าบริการหรือเงิน จำนวนใด ๆ
                            ตามสัญญานี้ตามกำหนดเป็นเวลาตั้งแต่ 2 งวดขึ้นไป <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.4 ผู้รับจ้างอาจใช้สิทธิ์บอกเลิกสัญญานี้ได้ หากเกิดหตุการณ์ใดเหตุการณ์หนึ่งดังต่อไปนี้และผู้ว่าจ้างไม่สามารถดำเนิน
                            การแก้ไขหรือปฏิบัติตามให้ถูกต้องตามสัญญภายใน 30 (สามสิบ) วันนับจากวันที่ผู้ว่าจ้างได้รับแจ้งหรือทราบเหตุแห่งการผิดสัญญานั้น <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1) เมื่อผู้ว่าจ้างผิดนัดไม่ชำระค่าบริการ หรือชำระไม่ครบถ้วนในส่วนของค่าบริการหรืองินจำนวนใด ๆ อันผู้ว่าจ้างพึงต้อง
                            ชำระให้แก่ผู้รับจ้างตามสัญญานี้ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) เมื่อผู้ว่าจ้างผิดสัญญาข้อหนึ่งข้อใดที่ได้กำหนดไว้ในสัญญานี้ ไม่ว่าข้อสัญญาดังกล่าวจะเป็นสาระสำคัญหรือไม่ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3) เมื่อผู้ว่าจ้างเลิกกิจการ ยื่นขอจดทะเบียนเลิกบริษัท ชำระบัญชี ควบรวมกิจการกับบุคคลอื่นยกเว้นการควบรวมกิจการที่
                            ได้รับความยินยอมล่วงหน้าจากผู้ให้บริการเป็นลายลักษณ์อักษร หรือสิ้นสภาพความเป็นนิติบุคคลด้วยประการอื่น ๆ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (4) เมื่อผู้ว่าจ้างมีหนี้สินล้นพันตัว ขอเข้าฟื้นฟูกิจการลัมละลาย หรือถูกพิทักษ์ทรัพย์ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 7. ผลจากการบอกเลิกสัญญา </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.1 ในกรณีที่สัญญาเป็นอันยกเลิกกันตามที่ระบุว้ในข้อ 6.1 ผู้รับจ้างยังคงไว้ซึ่งสิทธิ์ในการเรียกร้องให้ผู้ว่าจ้างชำระค่า บริการ ค่าใช้จ่าย
                            ดอกเบี้ยตามที่กำหนตไว้ในสัญญาและหรือตามฏหมาย และหรือเงินจำนวนใด ๆ ที่ค้างอยู่ตามสัญญาฉบับนี้ และไม่ตัดสิทธิ์ผู้รับจ้างที่จะเรียกร้องคำเสียหายอื่น ๆ ที่เกิดขึ้นจากผู้จงตามสัญญาฉบับนี้และตามกฎหมาย <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.2 ในกรณีที่ผู้ว่าจ้างบอกเลิกสัญญาตามที่ระบุไว้ในข้อ 6.2 หรือผู้รับจ้างบอกเลิกสัญญาตามที่ระบุไว้ในข้อ 6.3 และหรือ ข้อ 6.4
                            ผู้ว่าจ้างจะต้องชำระค่าเสียหายที่ไม่รวมภาษีมูลค่าเพิ่ม (ถ้ามี) ในอัตราค่าบริการรายเดือนตามข้อ 3 เป็นจำนวนเงินค่า บริการายเดือนจำนวน 3 (สาม) เดือน ทั้งนี้ไม่ตัดสิทธิ์ผู้รับจังที่จะเรียกร้องค่าเสียหายอื่น ๆ
                            หรือค่าใช้จ่ายที่เกิดขึ้นจากผู้ว่าจ้าง ตามสัญญาจ้างบริการพนักงานขับรถยนต์ฉบับนี้ และตามกฎหมาย <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 8. เอกสารอันเป็นส่วนหนึ่งของสัญญา </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เอกสารแนบท้ายสัญญาดังต่อไปนี้ให้ถือเป็นส่วนหนึ่งของสัญญานี้ <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.1 ผนวก 1 Confirmation Letter MDS114 LTO20026-2019 วันที่ 17 ธันวาคม 2562 จำนวน 1 (หนึ่ง) แผ่น 1 (หนึ่ง) หน้า <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.2 ผนวก 2 บันทึกข้อตกลงแนบท้ายสัญญจ้างบริการพนักงานขับรถยนต์ เลขที DA-LT-201900352 (1) / จำนวน 2 (สอง) แผ่น 2 (สอง) หน้า<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.3 ผนวก 3 <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หากมีข้อความใดในเอกสารแนบท้ายสัญญา ขัดหรือแย้งกับข้อความใด ๆ ในสัญญนี้แล้ว ให้ถือเอาช้อความในสัญญานี้มีผลบังคับใช้ต่อกัน <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 9. การส่งคำบอกกล่าว </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เว้นแต่จะได้ตกลงกันไว้เป็นอย่างอื่นโดยคู่สัญญา หรือหนังสือบอกกล่ว การบอกกล่าวและการสื่อสารใด ๆ ภายใต้สัญญา
                            นี้จะถูกส่งโดยการส่งมอบถึงตัวคู่สัญญาโดยพนักงานส่งเอกสาร หรือโดยจดหมายลงทะเบียน ไปยังที่อยู่ของคู่สัญญาตามที่ระบุใน สัญญานี้ หรือที่อยู่อันซึ่งคู่สัญญาได้แจ้งให้อีกฝ่ายทราบเป็นลายลักษณ์อักษรในเวลาต่อมา
                            และถือว่าได้รับโดยชอบแล้วเมื่อมีการ ส่งถึงตัวคู่สัญญาหรือถึงที่อยู่ดังกล่าว <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หากผู้ว่าจ้างย้ายภูมิลำเนา หรือย้ายสถานที่ทำงานผู้ว่าจ้างมีหน้าที่ต้องแจ้งให้ผู้รับจ้างทราบเป็นลายลักษณ์อักษรภายใน 7 (เจ็ด)
                            วันนับตั้งแต่วันที่ย้ายสถานที่ดังกล่ว หากผู้ว่าจ้างมิได้แจ้งให้ผู้รับจ้างทราบถึงการย้ายภูมิลำเนาดังกลา่วภายในกำหนด เวลาดังกล่าวข้างต้นให้ถือว่าคำบอกกล่าว หรือเอกสารใด ๆ
                            ที่ผู้รับจงได้ส่งถึงผู้จ้างตามภูมิลำนาที่ระบุไว้ตามสัญญานี้โดยวิธีที่กล่าวข้างต้น ผู้ว่าจ้างได้รับไว้โดยชอบแล้ว <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> ข้อ 10. กฎหมายที่ใช้บังคับ </u> <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "สัญญาฉบับนี้ทำขึ้นทั้งฉบับภาษาไทยและฉบับภาษาอังกฤษ หากมีข้อความใด ๆ ขัดหรือแย้งกันแล้ว ให้ยืดข้อความใน ฉบับภาษาไทยเป็นหลัก
                            และหากมีการพิพาทกันแล้วให้ยื่นต่อหรือวินิจฉัยโดยศาลไทยเท่านั้น" <br />
                            คู่สัญญาได้อ่านและเข้าใจข้อความในสัญญานี้อย่างดีแล้ว เห็นว่าถูกต้องตรงตามประสงค์ของทั้งสองฝ่าย จึงได้ทำการลง ลายมือซื่อไว้เป็นหลักฐานต่อหน้าพยาน <br />
                        </p>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <div class="form-row">
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_contractor_sign">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span><br>
                        <p>ผู้รับจ้าง</p>
                    </div>
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_customer_sign">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span><br>
                        <p>ผู้ว่าจ้าง</p>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <div class="form-row">
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_contractor_witness_1">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span> <br />
                        <p>พยาน</p>
                    </div>
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_customer_witness_1">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span><br>
                        <p>พยาน</p>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <div class="form-row">
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_contractor_witness_2">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span><br />
                        <p>พยาน</p>
                    </div>
                    <div class="col-md-6 mt-3 text-center">
                        ลงชื่อ............................................................................ <br />
                        <span class="text-color-red" id="show_customer_contract_customer_witness_2">
                            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        </span><br>
                        <p>พยาน</p>
                    </div>
                </div>
                <hr />
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="original" name="original" />
                                <label class="custom-control-label" for="original">Original</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="copy" name="original" />
                                <label class="custom-control-label" for="copy">Copy</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <a id="print_contract_th" target="_blank" type="button" class="btn btn-primary btn-md">
                                Print TH
                            </a>
                            <a id="print_contract_en" target="_blank" type="button" class="btn btn-success btn-md">
                                Print EN
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
