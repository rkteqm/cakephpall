    <div class="container" id="hideAfterFormSubmit">
        <h2 class="form-head">PATIENT REGISTRATION FORM</h2>
        <div class="container mt-4">
            <form action="" method="post" onsubmit="return submitMyForm();">
                <div class="row ms-3 me-3">
                    <div class="col-md-2 c-border cell-blue">Title</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="title1" name="title" value="Dr.">
                            <label class="form-check-label" for="title">Dr.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="title2" name="title" value="Mr.">
                            <label class="form-check-label" for="title">Mr.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="title3" name="title" value="Ms.">
                            <label class="form-check-label" for="title">Ms.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="title4" name="title" value="Mrs.">
                            <label class="form-check-label" for="title">Mrs.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="title5" name="title" value="Miss">
                            <label class="form-check-label" for="title">Miss</label>
                        </div>
                        <span id="titleErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Marital Status</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maritial" id="maritial1" value="Single">
                            <label class="form-check-label" for="maritial">Single</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maritial" id="maritial2" value="Married">
                            <label class="form-check-label" for="maritial">Married</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maritial" id="maritial3" value="Widowed">
                            <label class="form-check-label" for="maritial">Widowed</label>
                        </div>
                        <span id="maritialErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Name</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="name" name="name" class="input" placeholder="Enter your Name" value="">
                        <span id="nameErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Social Security#</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="social" name="social" class="input" placeholder="Enter Social Security">
                        <span id="socialErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Address</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="address" name="address" class="input" placeholder="Enter your address">
                        <span id="addressErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Birth Date</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="date" id="birth" name="birth" class="input" max="2022-11-29">
                        <span id="birthErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">City</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="city" name="city" class="input" placeholder="Enter your city">
                        <span id="cityErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Parents/Guardian</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="parents" name="parents" class="input" placeholder="Enter parents/guardian">
                        <span id="parentsErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">State </div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="state" name="state" class="input" placeholder="Enter your state">
                        <span id="stateErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Referred By</span></div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="referred" name="referred" class="input" placeholder="Enter your reference">
                        <span id="referredErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Zip</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="zip" name="zip" class="input" placeholder="Enter your zipcode">
                        <span id="zipErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Occupation</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="occupation" name="occupation" class="input" placeholder="Enter your occupation">
                        <span id="occupationErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="cellphone_p" name="cellphone_p" class="input" placeholder="Enter cell phone">
                        <span id="cellphone_pErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="cellphone_s" name="cellphone_s" class="input" placeholder="Enter cell phone">
                        <span id="cellphone_sErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Home Phone </div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="homephone" name="homephone" class="input" placeholder="Enter home phone">
                        <span id="homephoneErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Employer's Name</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="employer" name="employer" class="input" placeholder="Enter employer name">
                        <span id="employerErr" class="error" name="error"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-2 c-border cell-blue">Mobile Phone</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="mobilephone" name="mobilephone" class="input" placeholder="Enter mobile phone">
                        <span id="mobilephoneErr" class="error" name="error"></span>
                    </div>
                    <div class="col-md-2 c-border cell-blue">Employer's Email</div>
                    <div class="col-md-4 c-border cell-l-blue">
                        <input type="text" id="email" name="email" class="input" placeholder="Enter Employer email">
                        <span id="emailErr" class="error" name="error"></span>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row ms-1 me-1">
                        <div class="col-md-4 c-border cell-blue">Other Condition(s)</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <!-- <input type="text" id="other" name="other" class="input" placeholder="Enter other condition"> -->
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Medications are you presently taking</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <textarea id="medication_p" name="medication_p" cols="30" rows="1" class="input" placeholder="Enter your present medications"></textarea>
                            <span id="medication_pErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Name of family docter</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <input type="text" id="familydoctor" name="familydoctor" class="input" placeholder="Enter your family doctor name">
                            <span id="familydoctorErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Do you smoke?</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="smoke1" name="smoke" value="Yes">
                                <label class="form-check-label" for="smoke">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="smoke2" name="smoke" value="No">
                                <label class="form-check-label" for="smoke">No</label>
                            </div>
                            <span id="smokeErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">List any allergies to medications</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <textarea id="medication_list" name="medication_list" cols="30" rows="1" class="input" placeholder="Enter allergies Medication list"></textarea>
                            <span id="medication_listErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Date of last exam</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <input type="date" id="lastexam" name="lastexam" class="input" max="2022-11-28">
                            <span id="lastexamErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Did you ever where glasses or contact lenses?</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="glasses1" name="glasses" value="Yes">
                                <label class="form-check-label" for="glasses">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="glasses2" name="glasses" value="No">
                                <label class="form-check-label" for="glasses">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="text" name="old" id="old" placeholder="How old are they?">
                            </div>
                            <span id="glassesErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4 c-border cell-blue">Family history of eye disorders</div>
                        <div class="col-md-8 c-border cell-l-blue">
                            <textarea id="familyhistory" name="familyhistory" cols="30" rows="1" class="input" placeholder="Enter family history of eye disorders"></textarea>
                            <span id="familyhistoryErr" class="error" name="error"></span>
                        </div>
                    </div>
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row ms-1 me-1">
                        <div class="col-md-6 c-border cell-blue center">Primary Insurance</div>
                        <div class="col-md-6 c-border cell-blue center">Secondary Insurance</div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Insurance Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insurance_p" name="insurance_p" class="input" placeholder="Enter insurance name">
                            <span id="insurance_pErr" class="error" name="error"></span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Insurance Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insurance_s" name="insurance_s" class="input" placeholder="Enter insurance name">
                            <span id="insurance_sErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Employer</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="employer_p" name="employer_p" class="input" placeholder="Enter employer name">
                            <span id="employer_pErr" class="error" name="error"></span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Employer</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="employer_s" name="employer_s" class="input" placeholder="Enter employer name">
                            <span id="employer_sErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insured_p" name="insured_p" class="input" placeholder="Enter insured name">
                            <span id="insured_pErr" class="error" name="error"></span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insured_s" name="insured_s" class="input" placeholder="Enter insured name">
                            <span id="insured_sErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Birth Date</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="date" id="birth_p" name="birth_p" class="input" max="2022-11-29">
                            <span id="birth_pErr" class="error" name="error"></span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Birth Date</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="date" id="birth_s" name="birth_s" class="input" max="2022-11-29">
                            <span id="birth_sErr" class="error" name="error"></span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Insured's SS#</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insured_ss_p" name="insured_ss_p" class="input" placeholder="Enter insured ss">
                            <span id="insured_ss_pErr" class="error" name="error"></span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Insured's SS# </div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="insured_ss_s" name="insured_ss_s" class="input" placeholder="Enter insured ss">
                            <span id="insured_ss_sErr" class="error" name="error"></span>
                        </div>
                    </div>
                </div>
                <div class="container btn-div mb-2">
                    <button type="submit" class="btn" name="submit" value="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>