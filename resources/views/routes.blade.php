    
    register [Registro de Usuario]
    login [Autenticacion de Usuarios]

    /**Code verified */
    sendexpirytcode [Reenviar un codigo nuevo]
    verifycode [Verificacion de codigos]

    /**Company */
    [get] company                                       [obtener todas las company]
    [post] company                                      [crear nuevas company]
    [get] company/{company}                             [obtener una company por id]
    [put] company/{company}                             [actualizar una company por id]
    [put] company_delete/{company}                      [Eliminar un company]

    /**TimePoint */
    [get] timepoint                                     [obtener todas las timepoint]
    [post] timepoint                                    [crear nuevas timepoint]
    [get] timepoint/{timepoint}                         [obtener una timepoint por id]
    [put] timepoint/{timepoint}                         [actualizar una timepoint por id]
    [put] timepoint_delete/{timepoint}                  [Eliminar un timepoint]

    /**Employee */
    [get] employee                                      [obtener todas las employee]
    [post] employee                                     [crear nuevas employee]
    [get] employee/{employee}                           [obtener una employee por id]
    [put] employee/{employee}                           [actualizar una employee por id]
    [put] employee_delete/{employee}                    [Eliminar un employee]

    /**Study */
    [get] study                                         [obtener todas las study]
    [post] study                                        [crear nuevas study]
    [get] study/{study}                                 [obtener una study por id]
    [put] study/{study}                                 [actualizar una study por id]
    [put] study_delete/{study}                          [Eliminar un study]
    
     /**Compound Class */
    [get] compoundclass                                 [obtener todas las compoundclass]
    [post] compoundclass                                [crear nuevas compoundclass]
    [get] compoundclass/{compoundclass}                 [obtener una compoundclass por id]
    [put] compoundclass/{compoundclass}                 [actualizar una compoundclass por id]
    [put] compoundclass_delete/{compoundclass}          [Eliminar un compoundclass]

     /**Compound */
    [get] compound                                      [obtener todas las compound]
    [post] compound                                     [crear nuevas compound]
    [get] compound/{compound}                           [obtener una compound por id]
    [put] compound/{compound}                           [actualizar una compound por id]
    [put] compound_delete/{compound}                    [Eliminar un compound]
    
     /**Compound SubClass */
    [get] compoundsubclass                              [obtener todas las compoundsubclass]
    [post] compoundsubclass                             [crear nuevas compoundsubclass]
    [get] compoundsubclass/{compoundsubclass}           [obtener una compoundsubclass por id]
    [put] compoundsubclass/{compoundsubclass}           [actualizar una compoundsubclass por id]
    [put] compoundsubclass_delete/{compoundsubclass}    [Eliminar un compoundsubclass]

    /**Dosage */
    [get] dosage                                [obtener todas las dosage]
    [post] dosage                               [crear nuevas dosage]
    [get] dosage/{dosage}                       [obtener una dosage por id]
    [put] dosage/{dosage}                       [actualizar una dosage por id]
    [put] dosage_delete/{dosage}                [Eliminar un dosage]

     /**Dosage Route */
    [get] dosageroute                           [obtener todas las dosageroute]
    [post] dosageroute                          [crear nuevas dosageroute]
    [get] dosageroute/{dosageroute}             [obtener una dosageroute por id]
    [put] dosageroute/{dosageroute}             [actualizar una dosageroute por id]
    [put] dosageroute_delete/{dosageroute}      [Eliminar un dosageroute]

     /**EEG */
    [get] eeg                                   [obtener todas las eeg]
    [post] eeg                                  [crear nuevas eeg]
    [get] eeg/{eeg}                             [obtener una eeg por id]
    [put] eeg/{eeg}                             [actualizar una eeg por id]
    [put] eeg_delete/{eeg}                      [Eliminar un eeg]

    /**Effecton Sleep */
    [get] effectionsleep                        [obtener todas las effectonsleep]
    [post] effectionsleep                       [crear nuevas effectonsleep]
    [get] effectionsleep/{effectonsleep}        [obtener una effectonsleep por id]
    [put] effectionsleep/{effectonsleep}        [actualizar una effectonsleep por id]
    [put] effectionsleep_delete/{effectonsleep} [Eliminar un effectonsleep]

    /**Experimental Condition */
    [get] experimental                          [obtener todas las experimental]
    [post] experimental                         [crear nuevas experimental]
    [get] experimental/{experimental}           [obtener una experimental por id]
    [put] experimental/{experimental}           [actualizar una experimental por id]
    [put] experimental_delete/{experimental}    [Eliminar un experimental]
    

    /**genetically */
    [get] genetically                       [obtener todas las genetically]
    [post] genetically                      [crear nuevas genetically]
    [get] genetically/{genetically}         [obtener una genetically por id]
    [put] genetically/{genetically}         [actualizar una genetically por id]
    [put] genetically_delete/{genetically}  [Eliminar un genetically]

    /**Group */
    [get] group                             [obtener todas las group]
    [post] group                            [crear nuevas group]
    [get] group/{group}                     [obtener una group por id]
    [put] group/{group}                     [actualizar una group por id]
    [put] group_delete/{group}              [Eliminar un group]

     /**Result files */
    [get] resultfiles                       [obtener todas las resultfiles]
    [post] resultfiles                      [crear nuevas resultfiles]
    [get] resultfiles/{resultfiles}         [obtener una resultfiles por id]
    [put] resultfiles/{resultfiles}         [actualizar una resultfiles por id]
    [put] resultfiles_delete/{resultfiles}  [Eliminar un resultfiles]

    /**Specie  */
    [get] specie                            [obtener todas las specie]
    [post] specie                           [crear nuevas specie]
    [get] specie/{specie}                   [obtener una specie por id]
    [put] specie/{specie}                   [actualizar una specie por id]
    [put] specie_delete/{specie}            [Eliminar un specie]
    
    /**Strain  */
    [get] strain                            [obtener todas las strain]
    [post] strain                           [crear nuevas strain]
    [get] strain/{strain}                   [obtener una strain por id]
    [put] strain/{strain}                   [actualizar una strain por id]
    [put] strain_delete/{strain}            [Eliminar un strain]

    /**Target Class  */
    [get] targetclass                       [obtener todas las targetclass]
    [post] targetclass                      [crear nuevas targetclass]
    [get] targetclass/{target}              [obtener una targetclass por id]
    [put] targetclass/{target}              [actualizar una targetclass por id]
    [put] targetclass_delete/{target}       [Eliminar un targetclass]

    /**Target */
    [get] target                            [obtener todas las target]
    [post] target                           [crear nuevas target]
    [get] target/{target}                   [obtener una target por id]
    [put] target/{target}                   [actualizar una target por id]
    [put] target_delete/{target}            [Eliminar un target]

    /**Subject */
    [get] subject                           [obtener todas las subject]
    [post] subject                          [crear nuevas subject]
    [get] subject/{subject}                 [obtener una subject por id]
    [put] subject/{subject}                 [actualizar una subject por id]
    [put] subject_delete/{subject}          [Eliminar un subject]

    /**Subject Analysis */
    [get] subjectanalysis                   [obtener todas las experimental]
    [post] subjectanalysis                  [crear nuevas experimental]
    [get] subjectanalysis/{subject}         [obtener una experimental por id]
    [put] subjectanalysis/{subject}         [actualizar una experimental por id]
    [put] subjectanalysis_delete/{subject}  [Eliminar un experimental]

    /**Analysis Request */
    [get] analysisrequest                    [obtener todas las experimental]
    [post] analysisrequest                   [crear nuevas experimental]
    [get] analysisrequest/{analysis}         [obtener una experimental por id]
    [put] analysisrequest/{analysis}         [actualizar una experimental por id]
    [put] analysisrequest_delete/{analysis}  [Eliminar un experimental]
