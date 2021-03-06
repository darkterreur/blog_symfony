<?php
	namespace FrontBundle\Form;

	use Doctrine\ORM\EntityManager;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\EmailType;
	use Symfony\Component\Form\Extension\Core\Type\PasswordType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormError;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	class UserType extends AbstractType
	{

		/**
		 * UserType constructor.
		 * @param EntityManager $entityManager
		 */
		public function __construct(EntityManager $entityManager)
		{
			$this->em = $entityManager;
		}

		/**
	     * @param FormBuilderInterface $builder
	     * @param array $options
	     */
	    public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	        $builder
	            ->add('username')
			  	->add('email', EmailType::class)
			  	->add('password', PasswordType::class)
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