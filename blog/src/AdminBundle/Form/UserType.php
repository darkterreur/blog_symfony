<?php
	namespace AdminBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;



	class UserType extends AbstractType
	{

		/**
	     * @param FormBuilderInterface $builder
	     * @param array $options
	     */
	    public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	        $builder
	            ->add('username')
			  	->add('username_canonical') 
			  	->add('email')
			  	->add('email_canonical') 
			  	->add('enabled')
			  	->add('salt') 
			  	->add('password') 
			  	->add('last_login', 'datetime')
			  	->add('locked')
			  	->add('expired')
			  	->add('expires_at', 'datetime')
			  	->add('confirmation_token') 
			  	->add('password_requested_at', 'datetime')
			  	->add('roles', "textarea")
			  	->add('credentials_expired')
			  	->add('credentials_expire_at', 'datetime')
	        ;
	    }




	    /**
	     * @param OptionsResolver $resolver
	     */
	    public function configureOptions(OptionsResolver $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'CommonBundle\Entity\User'
	        ));
	    }








	}