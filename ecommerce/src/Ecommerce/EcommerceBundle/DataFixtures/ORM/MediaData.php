<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
    {
      
        $media2 = new media();
        $media2->setNom('bundles/images/accessoirephoto1.jpg');
      
        $manager->persist($media2);
        
        $media3 = new media();
        $media3->setNom('bundles/images/accessoirephoto2.jpg');
       
        $manager->persist($media3);

        $media4 = new media();
        $media4->setNom('bundles/images/accessoiretabl1.jpg');
        
        $manager->persist($media4);   
            
        $media5 = new media();
        $media5->setNom('bundles/images/accessoiretabl2.jpg');
        
        $manager->persist($media5);              
        
        $media6 = new media();
        $media6->setNom('bundles/images/accessoiretabl3.jpg');
       
        $manager->persist($media6);
        
        $media7 = new media();
        $media7->setNom('bundles/images/accessoiretele.jpg');
        
        $manager->persist($media7);
        
        $media8 = new media();
        $media8->setNom('bundles/images/accessoiretel2.jpg');
       
        $manager->persist($media8);
        
        $media9 = new media();
        $media9->setNom('bundles/images/accessoiretel3.jpg');
        
        $manager->persist($media9);

        $media10 = new media();
        $media10->setNom('bundles/images/accessoiretel4.jpg');
        
        $manager->persist($media10);

        $media11 = new media();
        $media11->setNom('bundles/images/accessoiretel5.jpg');
        
        $manager->persist($media11);

        $media12 = new media();
        $media12->setNom('bundles/images/accessoiretel6.jpg');
        
        $manager->persist($media12);

        $media13 = new media();
        $media13->setNom('bundles/images/accessoiretv1.jpg');
        
        $manager->persist($media13);

        $media14 = new media();
        $media14->setNom('bundles/images/accessoiretv2.jpg');
        
        $manager->persist($media14);

        $media15 = new media();
        $media15->setNom('bundles/images/accessoiretv3.jpg');
        
        $manager->persist($media15);

        $media16 = new media();
        $media16->setNom('bundles/images/accessoiretv4.jpg');
        
        $manager->persist($media16);

        $media17 = new media();
        $media17->setNom('bundles/images/accessoiretv5.jpg');
        
        $manager->persist($media17);

        $media18 = new media();
        $media18->setNom('bundles/images/equipbureau1.jpg');
        
        $manager->persist($media18);

        $media19 = new media();
        $media19->setNom('bundles/images/equipbureau2.jpg');
        
        $manager->persist($media19);

        $media20 = new media();
        $media20->setNom('bundles/images/equipbureau3.jpg');
        
        $manager->persist($media20);

        $media21 = new media();
        $media21->setNom('bundles/images/equipbureau4.jpg');
        
        $manager->persist($media21);

        $media22 = new media();
        $media22->setNom('bundles/images/imprimante1.jpg');
        
        $manager->persist($media22);

        $media23 = new media();
        $media23->setNom('bundles/images/imprimante2.jpg');
        
        $manager->persist($media23);

         $media24 = new media();
        $media24->setNom('bundles/images/ordinfix1.jpg');
        
        $manager->persist($media24);

        $media25 = new media();
        $media25->setNom('bundles/images/ordinfix2.jpg');
        
        $manager->persist($media25);

        $media26 = new media();
        $media26->setNom('bundles/images/ordinfix3.jpg');
        
        $manager->persist($media26);
        

        $media27 = new media();
        $media27->setNom('bundles/images/ordinport1.jpg');
        
        $manager->persist($media27);
        

        $media28 = new media();
        $media28->setNom('bundles/images/ordinport2.jpg');
        
        $manager->persist($media28);
        

        $media29 = new media();
        $media29->setNom('bundles/images/scanner1.jpg');
        
        $manager->persist($media29);
        

        $media30 = new media();
        $media30->setNom('bundles/images/scanner2.jpg');
        
        $manager->persist($media30);

        $media31 = new media();
        $media31->setNom('bundles/images/scanner3.jpg');
        
        $manager->persist($media31);


        $media32 = new media();
        $media32->setNom('bundles/images/stockagedisq1.jpg');
        
        $manager->persist($media32);

        $media33 = new media();
        $media33->setNom('bundles/images/stockagedisq2.jpg');
        
        $manager->persist($media33);

        $media34 = new media();
        $media34->setNom('bundles/images/stockagedisq3.jpg');
        
        $manager->persist($media34);


        $media35 = new media();
        $media35->setNom('bundles/images/stockagedisq4.jpg');
        
        $manager->persist($media35);


        $media36 = new media();
        $media36->setNom('bundles/images/stockageusb.jpg');
        
        $manager->persist($media36);


        $media37 = new media();
        $media37->setNom('bundles/images/stockageusb2.jpg');
        
        $manager->persist($media37);


        $media38 = new media();
        $media38->setNom('bundles/images/tablette1.jpg');
        
        $manager->persist($media38);


        $media39 = new media();
        $media39->setNom('bundles/images/tablette2.jpg');
        
        $manager->persist($media39);

        $media40 = new media();
        $media40->setNom('bundles/images/tablette3.jpg');
        
        $manager->persist($media40);

        $media41 = new media();
        $media41->setNom('bundles/images/tv1.jpg');
        
        $manager->persist($media41);

        $media42 = new media();
        $media42->setNom('bundles/images/tv2.jpg');
        
        $manager->persist($media42);

        $media43 = new media();
        $media43->setNom('bundles/images/tv3.jpg');
        
        $manager->persist($media43);


        $media44 = new media();
        $media44->setNom('bundles/images/2.jpg');
        
        $manager->persist($media44);

        $media45 = new media();
        $media45->setNom('bundles/images/3.jpg');
        
        $manager->persist($media45);

        $media46 = new media();
        $media46->setNom('bundles/images/4.jpg');
        
        $manager->persist($media46);

        $media47 = new media();
        $media47->setNom('bundles/images/5.jpg');
        
        $manager->persist($media47);

        $media48 = new media();
        $media48->setNom('bundles/images/6.jpg');
        
        $manager->persist($media48);

        $media50 = new media();
        $media50->setNom('bundles/images/Accent.jpg');
        
        $manager->persist($media50);

        $media51 = new media();
        $media51->setNom('bundles/images/Alcatel.jpg');
        
        $manager->persist($media51);
        
        $media52 = new media();
        $media52->setNom('bundles/images/crosscall.png');
        
        $manager->persist($media52);

        $media53 = new media();
        $media53->setNom('bundles/images/haier.png');
        
        $manager->persist($media53);
    
        $media54 = new media();
        $media54->setNom('bundles/images/Huawei.jpg');
        
        $manager->persist($media54);

        $media55 = new media();
        $media55->setNom('bundles/images/infinix.png');
        
        $manager->persist($media55);
    
        $media56 = new media();
        $media56->setNom('bundles/images/innjoo.png');
        
        $manager->persist($media56);

        $media56 = new media();
        $media56->setNom('bundles/images/LG.png');
        
        $manager->persist($media56);
    
        $media57 = new media();
        $media57->setNom('bundles/images/microsoft.png');
        
        $manager->persist($media57);

        $media58 = new media();
        $media58->setNom('bundles/images/nokia.jpg');
        
        $manager->persist($media58);

        $media59 = new media();
        $media59->setNom('bundles/images/oppo.png');
        
        $manager->persist($media59);

        $media60 = new media();
        $media60->setNom('bundles/images/samsung.jpg');
        
        $manager->persist($media60);

        $media61 = new media();
        $media61->setNom('bundles/images/ulefone.png');
        
        $manager->persist($media61);

        $media62 = new media();
        $media62->setNom('bundles/images/wiko.jpg');
        
        $manager->persist($media62);
    
        $manager->flush();
        
        
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);        
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);        
        $this->addReference('media8', $media8);
        $this->addReference('media9', $media9);
        $this->addReference('media10', $media10);
        $this->addReference('media11', $media11);
        $this->addReference('media12', $media12);
        $this->addReference('media13', $media13);        
        $this->addReference('media14', $media14);
        $this->addReference('media15', $media15);        
        $this->addReference('media16', $media16);
        $this->addReference('media17', $media17);
        $this->addReference('media18', $media18);
        $this->addReference('media19', $media19);
        $this->addReference('media20', $media20);
        $this->addReference('media21', $media21);        
        $this->addReference('media22', $media22);
        $this->addReference('media23', $media23);        
        $this->addReference('media24', $media24);
        $this->addReference('media25', $media25);
        $this->addReference('media26', $media26);
        $this->addReference('media27', $media27);
        $this->addReference('media28', $media28);
        $this->addReference('media29', $media29);        
        $this->addReference('media30', $media30);
        $this->addReference('media31', $media31);        
        $this->addReference('media32', $media32);
        $this->addReference('media33', $media33);
        $this->addReference('media34', $media34);
        $this->addReference('media35', $media35);
        $this->addReference('media36', $media36);
        $this->addReference('media37', $media37);        
        $this->addReference('media38', $media38);
        $this->addReference('media39', $media39);        
        $this->addReference('media40', $media40);
        $this->addReference('media41', $media41);
        $this->addReference('media42', $media42);        
        $this->addReference('media43', $media43);
        $this->addReference('media44', $media44);        
        $this->addReference('media45', $media45);
        $this->addReference('media46', $media46);
        $this->addReference('media47', $media47);        
        $this->addReference('media48', $media48);
      
        $this->addReference('media50', $media50);        
        $this->addReference('media51', $media51);
        $this->addReference('media52', $media52);
        $this->addReference('media53', $media53);        
        $this->addReference('media54', $media54);
        $this->addReference('media55', $media55);        
        $this->addReference('media56', $media56);
        $this->addReference('media57', $media57);
        $this->addReference('media58', $media58);        
        $this->addReference('media59', $media59);
        $this->addReference('media60', $media60);
        $this->addReference('media61', $media61);        
        $this->addReference('media62', $media62);
    }
    
    public function getOrder()
    {
        return 1;
    }
}
?>