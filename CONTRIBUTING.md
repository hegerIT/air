# Contributing to AIR

Thank you for your interest in contributing to AIR! We want to make this the universal standard for AI-web communication.

## How You Can Help

### 🚀 Use Cases & Feedback
- Test AIR with your website/business
- Report what works and what doesn't  
- Suggest new parameter types
- Share real-world AI integration stories

### 📝 Documentation
- Improve the specification
- Add more examples
- Write implementation guides
- Create tutorials

### 💻 Code Contributions
- Server implementations in different languages
- CMS plugins (WordPress, Drupal, etc.)
- AI client libraries
- Testing tools

### 🌍 Community Building
- Share AIR with others
- Write blog posts
- Give talks at conferences
- Help others implement AIR

## Development Process

### 1. Fork & Clone
```bash
git clone https://github.com/hegerIT/air.git
cd air
```

### 2. Create Feature Branch
```bash
git checkout -b feature/your-feature-name
```

### 3. Make Changes
- Follow existing code style
- Add tests if applicable
- Update documentation
- Test your changes

### 4. Submit Pull Request
- Describe what you changed and why
- Reference any related issues
- Be ready to iterate based on feedback

## Specification Changes

For changes to the core AIR protocol:

1. **Open an issue first** to discuss the change
2. **Backward compatibility** is important
3. **Real-world use cases** should drive changes
4. **Keep it simple** - complexity is the enemy

## Code Style

### General Principles
- **Readability over cleverness**
- **Consistent formatting**
- **Clear variable names**
- **Minimal dependencies**

### Language-Specific Guidelines
- **PHP**: PSR-2 coding standards
- **JavaScript**: ESLint standard config
- **Python**: PEP 8
- **Go**: gofmt and standard practices

## Testing

### Manual Testing
Test your AIR implementation with:
```bash
# Discovery
curl "https://your-domain.com/"

# Parameters  
curl "https://your-domain.com/?contact"
curl "https://your-domain.com/?services=keyword"
```

### Automated Testing
- Validate JSON structure
- Check required fields
- Test error handling
- Verify CORS headers

## Documentation Standards

- **Clear examples** for everything
- **Step-by-step guides** for implementations
- **Real business data** in examples (anonymized)
- **Multiple languages** when helpful

## Issue Guidelines

### Bug Reports
Include:
- What you expected to happen
- What actually happened
- Steps to reproduce
- Your environment (OS, browser, etc.)

### Feature Requests
Include:
- The problem you're trying to solve
- Why existing parameters don't work
- How it would help other users
- Proposed API design

### Questions
- Check existing documentation first
- Search previous issues
- Be specific about your use case

## Community Guidelines

### Be Respectful
- Welcoming to newcomers
- Constructive feedback only
- Diverse perspectives are valuable

### Stay Focused
- Keep discussions on-topic
- AIR should solve real problems
- Simple is better than complex

### Share Knowledge
- Help others learn AIR
- Document your discoveries
- Celebrate community wins

## Recognition

Contributors will be:
- Listed in README.md
- Mentioned in release notes
- Invited to join the core team (if interested)

## Getting Help

- **Discord**: [AIR Community Server] (coming soon)
- **Issues**: Use GitHub issues for technical questions
- **Email**: contact@heger.it for direct communication

## License

By contributing to AIR, you agree that your contributions will be licensed under the MIT License.

---

**Ready to help build the future of AI-web communication?** 

Start by trying AIR with your own website and sharing your experience!